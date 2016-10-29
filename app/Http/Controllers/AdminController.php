<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function overviewUsers()
    {
        $users = User::all();
        return view('useroverview', ['users' => $users]);
    }

    public function makeAdmin(Request $request)
    {
        $id = $request->id;
        $admin = $request->admin;

        if($admin == 0){
            $admin = 1;
        }else {
            $admin = 0;
        }

        $user = User::where('id', $id)->first();
        $user->admin = $admin;

        $message = 'Het is niet gelukt om de rol van de gebruiker aan te passen.';
        if($user->save()){
            $message = 'De rol van de gebruiker is aangepast.';
            //return view('admin')->with(['message', 'De rol van de gebruiker is aangepast.']);
            return redirect('useroverview')->with(['message' => $message]);
        }

        //return view('admin')->with(['message' => $message]);
    }
}
