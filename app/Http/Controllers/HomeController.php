<?php

namespace App\Http\Controllers;

use App\User;
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

    public function DoRegister(Request $request)
    {
        $operator_register = [
            'name' => $request->get('user_name'),
            'email' => $request->get('user_email'),
            'password' => $request->get('user_password'),
            'role' => 2,
        ];
        $this->validation($request);
        $operator_create = User::create($operator_register);
        if ($operator_create){
            return redirect()->back()->with(['success' => 'The user was successfully created']);
        } else{
            return redirect()->back()->with(['error' => 'The user not create']);
        }

    }

    private function validation($value)
    {
        $this->validate($value , [
            'user_email' => 'required|unique:users,email|email',
            'user_password' => 'required|min:5|max:10',
        ],[
            'user_email.required' => 'It is necessary to enter the Email',
            'user_email.email' => 'Please follow the correct email format',
            'user_email.unique' => 'this email is not unique',
            'user_password.required' => 'It is necessary to enter the password',
            'user_password.min' => 'The password should not be less than 5 letters',
            'user_password.max' => 'The password should not be more 10 letters',
        ]);
    }
}
