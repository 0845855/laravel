<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function overviewUsers(){

        $users = User::all();
        return view('useroverview', ['users' => $users]);
    }

    public function makeAdmin(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if($user->admin == 0){
            $user->admin = 1;
        }else{
            $user->admin = 0;
        }

        $user->save();
        return view('useroverview')->with('message', 'De rol van de gebruiker is aangepast.');
    }
}
