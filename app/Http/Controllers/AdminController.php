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

    public function makeAdmin($id, $bool)
    {
        if($bool == 1){
            $bool = 0;
        }elseif($bool == 0){
            $bool = 1;
        }
    }
}
