<?php

namespace App\Http\Controllers;

use App\Message;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


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
        $query_table = DB::table('profiles');
        $profile_information_user = $query_table->where('profile_user_id', '=', $user_auth->id)->get();
        if ($user_find_query instanceof User) {
            return view('home.profile.index', compact('user_find_query', 'all_users', 'profile_information_user'));
        }

    }

    public function edit()
    {
        return view('home.profile.edit');
    }

    public function store(Request $request)
    {
        $auth_user_find = Auth::user();
        $user_model_find = User::find($auth_user_find->id);
        $img_profile_name = Str::random(5) . '/' . $request->file('profile_img')->getClientOriginalName();
        $this->validate($request, [
            'profile_website' => 'required',
            'profile_description' => 'required',
            'profile_img' => 'required',
        ], [
            'profile_website.required' => 'It is necessary to enter your website',
            'profile_description.required' => 'It is necessary to enter your about me',
            'profile_img.required' => 'It is necessary to enter upload image',
        ]);
        $profile_information = [
            'profile_website' => $request->get('profile_website'),
            'profile_user_id' => $auth_user_find->id,
            'profile_user_name' => $auth_user_find->name,
            'profile_description' => $request->get('profile_description'),
            'profile_img' => $img_profile_name,
            'img_size' => $request->file('profile_img')->getSize(),
        ];
        if ($user_model_find instanceof User) {
            $create_edit = Profile::create($profile_information);
            $request->file('profile_img')->move('images', $img_profile_name);
            if ($create_edit) {
                return redirect()->Route('app.home.profile')->with(['success' => 'your edit is successfully created']);
            } else {
                return redirect()->Route('app.home.profile')->with(['error' => 'your edit is not successfully create']);
            }
        }


    }

    public function change($profile_id)
    {
        if (ctype_digit($profile_id)) {
            $profile_find_user = Profile::find($profile_id);
            if ($profile_find_user instanceof Profile) {
                return view('home.profile.edit' , compact('profile_find_user'));
            }

        }

    }

    public function update(Request $request , $profile_id)
    {
        $this->validate($request, [
            'profile_website' => 'required',
            'profile_description' => 'required',
            'profile_img' => 'required',
        ], [
            'profile_website.required' => 'It is necessary to enter your website',
            'profile_description.required' => 'It is necessary to enter your about me',
            'profile_img.required' => 'It is necessary to enter upload image',
        ]);
        $profile_edit_img_name = Str::random(5) . "/" . $request->file('profile_img')->getClientOriginalName();
        $crop_photo = $request->file('profile_img');
      //  $crop_photo->resize(100 , 100);
        $crop_photo->move('images' , $profile_edit_img_name );
        $profile_update = Profile::find($profile_id);
        $profile_description_about_me = $request->get('profile_description');
        $profile_update_information = [
            'profile_website' => $request->get('profile_website'),
            'profile_description' =>  isset( $profile_description_about_me) ?  $profile_description_about_me : '!!!sorry this field is empty!!!',
            'profile_img' => $profile_edit_img_name,
        ];
        if ($profile_update instanceof Profile) {
            $profile_update->update($profile_update_information);

            return redirect()->Route('app.home.profile')->with(['success' => 'this profile was successfully updated']);
        }
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

    /*    public function test()
        {
            $user_auth_test = Auth::user();
            $user_find_test = User::find(22);
            $user_message = $user_find_test->messages()->get();
            dd($user_message);

        }*/


}
