<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

use App\Http\Requests;

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

        $search = News::where('title', 'like', '%'.$name.'%')  // WHERE
            ->orWhere('introduction', 'like', '%'.$name.'%')   // OF
            ->orWhere('news_item', 'like', '%'.$name.'%');     // OF
                                                               // ALS CATEGORIE IS INGEVULD....
            if(isset($category[0])){
                $search = $search->where('category', '=', $category[0]); // WHERE
            }
            if(isset($category[1])){
                $search = $search->where('category', '=', $category[1]); // EN
            }
            if(isset($category[2])){
                $search = $search->where('category', '=', $category[2]); // EN
            }

            $search = $search->orderBy('created_at', 'desc')->get();     // EN ORDER BY

            /*if($category !== NULL) {
                foreach ($category as $categoryItem) {
                    $search->where('category', $categoryItem);
                }
            }*/

            //$search ->orderBy('created_at', 'desc')->get();

        return view('searchresults', ['search' => $search]);
    }
}
