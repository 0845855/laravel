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
        $news = News::where('active', '=', 1)->orderBy('created_at', 'desc')->get();
        return view('welcome', ['news' => $news]);
    }

    public function nieuwsNews()
    {
        $news = News::where([['category', '=', 'nieuws'], ['active', '=', 1]])->orderBy('created_at', 'desc')->get();
        return view('shownews', ['news' => $news]);
    }

    public function reviewNews()
    {
        $news = News::where([['category', '=', 'review'], ['active', '=', 1]])->orderBy('created_at', 'desc')->get();
        return view('showreviews', ['news' => $news]);
    }

    public function previewNews()
    {
        $news = News::where([['category', '=', 'preview'], ['active', '=', 1]])->orderBy('created_at', 'desc')->get();
        return view('showpreviews', ['news' => $news]);
    }

    public function showNews($id)
    {
        $news = News::where('id', $id)->first();
        return view('news', ['news' => $news]);
    }

    public function getAddNews(){
        return view('addnews');
    }

    public function editNewsItem($id){

        $news = News::where('id', $id)->first();
        return view('editnews', ['news' => $news]);
    }

    public function deleteNewsItem($id){

        $news = News::where('id', $id)->first();
        return view('deletenews', ['news' => $news]);
    }

    public function overviewNews(){

        $news = News::all();
        return view('newsoverview', ['news' => $news]);
    }

    public function makeActive(Request $request)
    {
        $id = $request->id;
        $active = $request->active;

        if($active == 0){
            $active = 1;
        }else {
            $active = 0;
        }

        $news = News::where('id', $id)->first();
        $news->active = $active;

        $message = 'Het is niet gelukt om de status van het nieuwsbericht tewijzigen.';
        if($news->save()){
            $message = 'De status van het bericht is succesvol gewijzigd.';
            //return view('admin')->with(['message', 'De rol van de gebruiker is aangepast.']);
            return redirect('newsoverview')->with(['message' => $message]);
        }
    }

    public function createNews(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'introduction' => 'required',
            'news_item' => 'required',
            'category' => 'required',
            'user_id' => 'required',
        ]);

        $news = new News();

        $news->title = $request->title;
        $news->introduction = $request->introduction;
        $news->news_item = $request->news_item;
        $news->category = $request->category;
        $news->user_id = $request->user_id;

        $message = 'Nieuwsbericht is niet gemaakt';
        if($request->user()->news()->save($news))
        {
            $message = 'Nieuwsbericht is succesvol gemaakt';
        }

        return redirect('addnews')->with(['message' => $message]);
    }

    public function editNews(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required',
            'introduction' => 'required',
            'news_item' => 'required',
            'category' => 'required',
            'user_id' => 'required',
        ]);

        $news = News::find($request->id);
        $news->title = $request->title;
        $news->introduction = $request->introduction;
        $news->news_item = $request->news_item;
        $news->user_id = Auth::user()->id;
        $message = 'Het is niet gelukt om het nieuwsbericht te wijzigen';
        if($news->save())
        {
            $message = 'Het nieuwsbericht is succesvol gewijzigd.';
        }
        return redirect('editnews/'.$news->id)->with(['message' => $message]);
    }

    public function deleteNews(Request $request)
    {
        $id = $request->id;
        $message = 'Nieuwsbericht is niet verwijderd';
        News::findOrFail($id)->delete();
        //$news->delete($news->id);

        $request->session()->flash('message', 'Het bericht is verwijderd.');

        /*if($request->user()->news()->delete($news))
        {
            $message = 'Nieuwsbericht is succesvol verwijderd';
        }*/

        return redirect('newsoverview');
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
