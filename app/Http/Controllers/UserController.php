<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function getEditPage()
    {
        return view('user_edit');
    }

    public function getEditPasswordPage()
    {
        return view('password_edit');
    }

    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $message = 'Het is niet gelukt om de gegevens te wijzigen';
        if($user->save())
        {
            $message = 'Uw gegevens zijn succesvol gewijzigd.';
        }
        return redirect('user_edit/')->with(['message' => $message]);
    }

    public function doChangePassword(Request $request)
    {
        $this->validate($request, [
            'password_current' => 'required|min:6',
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6',
        ]);

        $current = bcrypt($request->password_current);
        $password = bcrypt($request->password);
        $confirm = bcrypt($request->password_confirm);
        dd($current);

        $user = User::find(Auth::user()->id);

        if($user->password !== $current){
            $message = 'Het huidige wachtwoord klopt niet met onze gegevens';
            return view('password_edit')->with(['message' => $message]);
        }

        if($password !== $confirm)
        {
            $message = 'De wachtwoorden komen niet overeen.';
            return view('password_edit')->with(['message' => $message]);
        }else
        {
            if ($user->save()) {
                $message = 'U heeft uw wachtwoord succesvol gewijzigd';
                 return view('password_edit')->with(['message' => $message]);
            }
        }
    }
}
