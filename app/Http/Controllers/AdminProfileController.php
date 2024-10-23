<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index', [
            'user' => User::where('role', 'admin')->get(),
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
        return view('admin.profile.edit', [
            'user' => Auth()->user(),
            'data' => Setting::all()
        ]);
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
            'name' => 'required',
            'ttl' => 'required',
            'gender' => 'required',
            'job' => 'required',
        ];

        if ($request->email != $request->oldEmail) {
            $rules['email'] = 'required|email|unique:users';
        }

        if ($request->username != $request->oldUsername) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->phone_number != $request->oldPhoneNumber) {
            $rules['phone_number'] = 'required|numeric|unique:users';
        }

        $validatedData = $request->validate($rules);
        $validatedData['image'] = $request['old-image'];

        if ($request->image) {
            $imageData = $request['image-cropper'];
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = 'admin-image-' . time() . '.png';

            $validatedData['image'] = 'user-images/' . $imageName;

            file_put_contents(public_path('storage/user-images/' . $imageName), $imageData);
        }

        User::where('id', $request->id)->update($validatedData);
        return redirect('/admin/profiles')->with('success', 'Your data has been successfully changed!');
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
