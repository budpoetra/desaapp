<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Content;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login', [
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'data' => Setting::all()
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::select('select * from users where email = "' . $credentials['email'] . '"');

        if ($user) {
            if (!$user[0]->status) {
                return back()->with('loginError', 'Your account is still waiting for verification from the admin!');
            }

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (auth()->user()->role == 'admin') {
                    return redirect()->intended('/admin');
                }

                return redirect()->intended('/user');
            }

            return back()->with('loginError', 'Your email or password is incorrect!');
        } else {
            return back()->with('loginError', 'Your email or password is incorrect!');
        }
    }

    public function register()
    {
        return view('register', [
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'data' => Setting::all()
        ]);
    }

    public function authenticateRegister(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'confPassword' => 'required|same:password',
            'name' => 'required',
            'phone_number' => 'required|numeric|unique:users',
            'ttl' => 'required',
            'gender' => 'required',
            'job' => 'required',
        ];

        $registerData = $request->validate($rules);

        $registerData['password'] = bcrypt($request->password);
        $registerData['role'] = 'author';
        $imageData = $request['image-cropper'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = 'user-image-' . time() . '.png';
        $registerData['image'] = 'user-images/' . $imageName;
        $registerData['status'] = 0;

        file_put_contents(public_path('storage/user-images/' . $imageName), $imageData);
        User::create($registerData);

        return redirect('/login')->with('success', 'Registration successful, please wait for admin to verify your account!');
    }

    public function forgotPassword()
    {
        return view('forgot-password', [
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'data' => Setting::all()
        ]);
    }

    public function checkDataForgotPassword(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'username' => 'required',
            'ttl' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $checkData = User::where('email', $validatedData['email'])->where('username', $validatedData['username'])->where('ttl', $validatedData['ttl'])->get();

        if ($checkData->isEmpty()) {
            return back()->with('error', 'Sorry, we could not find the data you entered!');
        }
        session(['username' => $checkData[0]->username]);
        return redirect()->intended('/change-password');
    }

    public function changeForgotPassword()
    {
        if (!Session::get('username')) {
            return redirect()->intended('/login');
        }

        return view('change-password', [
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'username' => Session::get('username'),
            'data' => Setting::all()
        ]);
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'newPassword' => 'required|min:6',
            'confPassword' => 'required|same:newPassword',
        ]);

        $password = bcrypt($validatedData['newPassword']);
        User::where('username', $validatedData['username'])->update(['password' => $password]);
        return redirect()->intended('/login')->with('success', 'Your password has been changed, please login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
