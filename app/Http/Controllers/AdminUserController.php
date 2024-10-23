<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Ebook;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.users.index', [
            'users' => User::where([
                'role' => 'author',
                'status' => 1
            ])->get(),
            'posts' => Post::all(),
            'ebooks' => Ebook::all(),
            'videos' => Video::all(),
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
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.users.show', [
            'user' => $user,
            'posts' => Post::where('user_id', $user->id)->get(),
            'ebooks' => Ebook::where('user_id', $user->id)->get(),
            'videos' => Video::where('user_id', $user->id)->get(),
            'data' => Setting::all()
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $posts = DB::select('select * from posts where user_id = ' . $user->id);
        foreach ($posts as $post) {
            Post::destroy($post->id);
            Storage::delete($post->image);
        }

        $ebooks = DB::select('select * from ebooks where user_id = ' . $user->id);
        foreach ($ebooks as $ebook) {
            Ebook::destroy($ebook->id);
            Storage::delete($ebook->image);
            Storage::delete($ebook->ebook);
        }

        $videos = DB::select('select * from videos where user_id = ' . $user->id);
        foreach ($videos as $video) {
            Video::destroy($video->id);
            Storage::delete($video->thumbnail);
            Storage::delete($video->video);
        }

        User::destroy($user->id);
        Storage::delete($user->image);
        return redirect('/admin/users')->with('success', 'The user has been removed along with his/her posts, ebooks and videos!');
    }
}
