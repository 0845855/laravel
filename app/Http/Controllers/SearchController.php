<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function searchPage(/*Request $request*/)
    {
        /*$name = $request->name;

        $search = News::where('title', 'like', '%'.$name.'%')
            ->orWhere('introduction', 'like', '%'.$name.'%')
            ->orWhere('news_item', 'like', '%'.$name.'%')
            ->orderBy('created_at', 'desc')->get();*/

        return view('search');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'searchtext' => 'required'
        ]);

        $name = $request->searchtext;
        $category = $request->category;

        /*
         * Tekst moet worden gezocht in title, inleiding en tekst, alle categorieën.
         * Wanneer een categorie is gekozen moet de tekst alleen in deze categorieën worden gezocht.
         */

        $search = News::orderBy('created_at');
        $search = $search->where('active', '=', 1);

        if($category !== NULL) {
            $i = 0;
            foreach ($category as $categoryItem) {
                if($i > 0) {
                    $search = $search->orWhere('category', '=', $categoryItem);

                } else {
                    $search = $search->where('category', '=', $categoryItem);
                }
                $i++;
            }
        }

        $search = $search->where('title', 'like', '%'.$name.'%')
            ->orWhere('introduction', 'like', '%'.$name.'%')
            ->orWhere('news_item', 'like', '%'.$name.'%');

            $search = $search->orderBy('created_at', 'desc')->get();

        return view('searchresults', ['search' => $search]);
    }
}
