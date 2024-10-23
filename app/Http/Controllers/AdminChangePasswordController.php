<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.change-password.index', [
            'data' => Setting::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confPassword' => 'required|min:6'
        ];

        $validatedDate = $request->validate($rules);

        $user = DB::select('select * from users where username = ' . "'" . $request->username . "'");

        if (!password_verify($request->oldPassword, $user[0]->password)) {
            return redirect('/admin/change-password')->with('warning', 'Your old password is wrong!');
        }

        if ($request->newPassword != $request->confPassword) {
            return redirect('/admin/change-password')->with('warning', 'Your new password does not match the confirmed password!');
        }

        $newPassword = bcrypt($request->newPassword);
        DB::update('update users set password = "' . $newPassword . '" where username = "' . $request->username . '"');
        return redirect('/admin/change-password')->with('success', 'Your password has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
