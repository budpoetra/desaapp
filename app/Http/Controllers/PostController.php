<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Content;
use App\Models\Setting;
use App\Models\PostCategory;
use App\Models\Advertisement;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString(),
            'categories' => PostCategory::latest()->get(),
            'allPosts' => Post::all(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('single-post', [
            'post' => $post,
            'categories' => PostCategory::latest()->get(),
            'allPosts' => Post::all(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
