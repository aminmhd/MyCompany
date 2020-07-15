<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login()
    {
        return view('home.auth.login');
    }

    public function DoLogin(Request $request)
    {
        $auth_login = [
            'email' => $request->get('user_email'),
            'password' => $request->get('user_password'),
        ];
        $login = Auth::attempt($auth_login);
        if ($login) {
            return redirect()->Route('app.index')->with(['success' => 'you are login successfully']);
        } else {
            return redirect()->Route('app.home.login')->with(['error' => 'your information in not true']);
        }
        
    }

}
