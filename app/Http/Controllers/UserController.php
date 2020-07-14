<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('panel.Layout.app');
    }

    public function create()
    {
        return view('panel.User.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);
        $create_user = [
            'name' => $request->get('user_name'),
            'password' => $request->get('user_password'),
            'email' => $request->get('user_email'),
            'role' => $request->get('user_role'),
        ];
        $created_table = User::create($create_user);
        if ($created_table instanceof User) {
            return redirect()->Route('app.create.user')->with(['success' => 'The user was successfully created']);
        }

    }

    private function validation($value)
    {
        $this->validate($value, [
            'user_name' => 'required',
            'user_email' => 'required|unique:users,email|email',
            'user_password' => 'required|min:5|max:10',
        ], [
            'user_name.required' => 'It is necessary to enter the Name',
            'user_email.required' => 'It is necessary to enter the Email',
            'user_email.email' => 'Please follow the correct email format',
            'user_email.unique' => 'this email is not unique',
            'user_password.required' => 'It is necessary to enter the password',
            'user_password.min' => 'The password should not be less than 5 letters',
            'user_password.max' => 'The password should not be more 10 letters',
        ]);

    }

    public function show()
    {
        $users_created = User::all();
        return view('panel.user.create_table', compact('users_created'));
    }

    public function destroy($id)
    {
        $user_find = User::find($id);
        if ($user_find instanceof User) {
            $user_delete = $user_find->delete();
            if ($user_delete) {
                return redirect()->Route('app.show.table')->with(['success' => 'The user was successfully deleted']);
            }
        } else {
            return redirect()->Route('app.show.table');
        }
    }

    public function edit($id)
    {
        if (ctype_digit($id)) {
            $user_edit = User::find($id);
            if ($user_edit instanceof User) {
                return view('panel.user.create', compact('user_edit'));
            }
        }

    }

    public function update(Request $request, $id)
    {
        if (ctype_digit($id)) {
            $user_find = User::find($id);
            $user_request = [
                'name' => $request->get('user_name'),
                'password' => $request->get('user_password'),
                'email' => $request->get('user_email'),
                'role' => $request->get('user_role'),
            ];
            $this->validate($request, [
                'user_name' => 'required',
                'user_email' => 'required',
            ], [
                'user_name.required' => 'It is necessary to enter the Name',
                'user_email.required' => 'It is necessary to enter the Email',
                'user_email.email' => 'Please follow the correct email format',
                'user_email.unique' => 'this email is not unique',
            ]);

            if ($user_find instanceof User) {
                $user_find->update($user_request);
                return redirect()->Route('app.show.table')->with(['success' => 'this user was successfully updated']);
            }
        }


    }

/*    public function modal($id)
    {
        $user_modal = User::find($id);
        return view('panel.notification.modal');

    }*/


}
