<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePostCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostCategoryRequest  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        //
    }
}
