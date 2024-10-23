<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Post!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('user.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
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
        return view('user.posts.create', [
            'categories' => PostCategory::all(),
            'data' => Setting::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'required|image|file',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');
        $validatedData['user_id'] = auth()->user()->id;

        $imageData = $request['image-cropper'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = 'post-image-' . time() . '.png';
        $validatedData['image'] = 'post-images/' . $imageName;
        file_put_contents(public_path('storage/post-images/' . $imageName), $imageData);

        Post::create($validatedData);
        return redirect('/user/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $title = 'Delete Post!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('user.posts.show', [
            'post' => $post,
            'data' => Setting::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('user.posts.edit', [
            'post' => $post,
            'categories' => PostCategory::all(),
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $rules = [
            'category_id' => 'required',
            'body' => 'required',
        ];

        if ($request->title != $post->title) {
            $rules['title'] = 'unique:posts';
            $rules['slug'] = 'required';
            $request['slug'] = Str::of($request->title)->slug('-');
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            Storage::delete($post->image);
            $imageData = $request['image-cropper'];
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = 'post-image-' . time() . '.png';
            $validatedData['image'] = 'post-images/' . $imageName;
            file_put_contents(public_path('storage/post-images/' . $imageName), $imageData);
        }

        $validatedData['user_id'] = auth()->user()->id;

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/user/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        Storage::delete($post->image);
        Post::destroy('id', $post->id);
        return redirect('/user/posts')->with('success', 'Post has been deleted!');
    }
}
