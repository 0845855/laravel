<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    //
    public function profile(){
        return view('profile');
    }
    public function admin(){
        return view('admin');
    }

    public function addNews(){
        return view('addNews');
    }
}