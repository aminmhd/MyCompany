<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        if ($operator_create) {
            return redirect()->back()->with(['success' => 'The user was successfully created']);
        } else {
            return redirect()->back()->with(['error' => 'The user not create']);
        }

    }

    private function validation($value)
    {
        $this->validate($value, [
            'user_email' => 'required|unique:users,email|email',
            'user_password' => 'required|min:5|max:10',
        ], [
            'user_email.required' => 'It is necessary to enter the Email',
            'user_email.email' => 'Please follow the correct email format',
            'user_email.unique' => 'this email is not unique',
            'user_password.required' => 'It is necessary to enter the password',
            'user_password.min' => 'The password should not be less than 5 letters',
            'user_password.max' => 'The password should not be more 10 letters',
        ]);
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        $user_auth = Auth::user();
        $user_find_query = User::find($user_auth->id);
        $all_users = User::all();
        if ($user_find_query instanceof User) {
            return view('home.profile.index', compact('user_find_query', 'all_users'));
        }

    }

    public function edit()
    {
        return view('home.profile.edit');
    }

    public function store(Request $request)
    {

    }

    public function message(Request $request)
    {
        $auth_user = Auth::user();
        $message_request = [
            'message_description' => $request->get('admin_message'),
            'message_user_id' => $auth_user->id,
            'message_user_name' => $auth_user->name,
        ];
        $request_sync_user_message = $request->get('admin_user_select');
        $create_table_message = Message::create($message_request);
        if ($create_table_message) {
            $create_table_message->users()->sync($request_sync_user_message);
            return redirect()->Route('app.home.test');
        }
    }

    public function test()
    {
        $user_auth_test = Auth::user();
        $user_find_test = User::find(22);
        $user_message = $user_find_test->messages()->get();
        dd($user_message);

    }


}
