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
        $public_path = public_path('\image');
        $user_message = $user_find_query->messages()->get();
        $profile_information_user = $query_table->where('profile_user_id', '=', $user_auth->id)->get();

        if ($user_find_query instanceof User) {
            return view('home.profile.index', compact('user_find_query', 'all_users', 'profile_information_user', 'public_path', 'user_message'));
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
        $img_profile_name = $request->file('profile_img');
        /*//////////////////////////////*/


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
            'profile_img' => Str::random(5) . "-" . $img_profile_name->getClientOriginalName(),
            'img_size' => $request->file('profile_img')->getSize(),
        ];
        if ($user_model_find instanceof User) {
            $create_edit = Profile::create($profile_information);
            $destinationPath = public_path('images');
            $img_profile_name->move($destinationPath, $profile_information['profile_img']);

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
                return view('home.profile.edit', compact('profile_find_user'));
            }

        }

    }

    public function update(Request $request, $profile_id)
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
        $profile_edit_img_name = $request->file('profile_img');
        /*///////////////////*/

        // $crop_photo->move('images' , $profile_edit_img_name );
        $profile_update = Profile::find($profile_id);
        $profile_description_about_me = $request->get('profile_description');
        $profile_update_information = [
            'profile_website' => $request->get('profile_website'),
            'profile_description' => isset($profile_description_about_me) ? $profile_description_about_me : '!!!sorry this field is empty!!!',
            'profile_img' => Str::random(5) . "-" . $profile_edit_img_name->getClientOriginalName(),
        ];
        if ($profile_update instanceof Profile) {
            $profile_update->update($profile_update_information);
            if ($request->has('profile_img')){
                $destinationPath = public_path('images');
                $profile_edit_img_name->move($destinationPath, $profile_update_information['profile_img']);
            }

            return redirect()->Route('app.home.profile')->with(['success' => 'this profile was successfully updated']);
        }
    }


}
