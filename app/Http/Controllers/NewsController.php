<?php

namespace App\Http\Controllers;


use App\Models\News;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('index', ['news' => $news]);
    }

    public function homepageNews()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('welcome', ['news' => $news]);
    }

    public function nieuwsNews()
    {
        $news = News::where('category', '=', 'nieuws')->orderBy('created_at', 'desc')->get();
        return view('shownews', ['news' => $news]);
    }

    public function reviewNews()
    {
        $news = News::where('category', '=', 'review')->orderBy('created_at', 'desc')->get();
        return view('showreviews', ['news' => $news]);
    }

    public function previewNews()
    {
        $news = News::where('category', '=', 'preview')->orderBy('created_at', 'desc')->get();
        return view('showpreviews', ['news' => $news]);
    }

    public function showNews($id)
    {
        $news = News::find($id);
        return view('news', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'introduction' => 'required',
            'news_item' => 'required',
            'category' => 'required'
        ]);

        $news = new News();

        $news->title = $request->title;
        $news->introduction = $request->introduction;
        $news->news_item = $request->news_item;
        $news->category = $request->category;

        $message = 'Nieuwsbericht is niet gemaakt';
        if($request->user()->news()->save($news))
        {
            $message = 'Nieuwsbericht is succesvol gemaakt';
        }

        return redirect('addNews')->with(['message' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'introduction' => 'required',
            'news_item' => 'required',
            'author_id' => 'required',
        ]);

        $news = new News;
        $news->title = $request->title;
        $news->introduction = $request->introduction;
        $news->news_item = $request->news_item;
        $news->author_id = $request->author_id;
        $news->save();
        return redirect('admin.news.index')->with('message', 'Nieuwsbericht is geupdated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('admin.news.show')->with('detailpage', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit')->with('detailpage', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'introduction' => 'required',
            'news_item' => 'required',
            'author_id' => 'required',
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->introduction = $request->introduction;
        $news->news_item = $request->news_item;
        $news->author_id = Auth::user()->id;
        $news->save();
        return redirect('admin.news.index')->with('message', 'Nieuwsbericht is gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('admin.news.index')->with('message', 'Nieuwsbericht is verwijderd.');
    }

    public function getAllNews(News $news)
    {
        $news = News::all();
        /*$news = DB::table('news')
            ->orderBy('created_at', 'desc')
            ->get();*/
        return view('welcome', compact($news));
        //return view('index', ['news' => $news]);
    }
}
