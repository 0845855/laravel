<?php

namespace App\Http\Controllers;


use App\Models\News;
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
        //
        $news = News::all();
        $news = DB::table('news')->paginate(15);
        return View('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/news/create.blade.php)
        return View::make('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'introduction'      => 'required',
            'news_item' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('news/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $news = new News;
            $news->title             = Input::get('title');
            $news->introduction      = Input::get('introduction');
            $news->news_item         = Input::get('news_item');
            $news->save();

            // redirect
            Session::flash('message', 'Bericht succesvol geplaatst');
            return Redirect::to('news');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // vraag nieuwsbericht op
        $news = News::find($id);

        // Show het bericht in een view
        return View('news.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get nieuwsbericht
        $news = News::find($id);

        // Show edit form in view
        return View::make('news.edit')
            ->with('news', $news);
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'introduction'      => 'required',
            'news_item' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('news/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = News::find($id);
            $nerd->title = Input::get('title');
            $nerd->introduction = Input::get('introduction');
            $nerd->news_item = Input::get('news_item');
            $nerd->save();

            // redirect
            Session::flash('message', 'Nieuwsbericht succesvol aangepast!');
            return Redirect::to('news');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $news = News::find($id);
        $news->delete();

        // redirect
        Session::flash('message', 'Bericht succesvol verwijderd!');
        return Redirect::to('news');
    }
}
