<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Post Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.post-categories.index', [
            'categories' => PostCategory::all(),
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
        return view('admin.post-categories.create', [
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
        $slug = Str::of($request->name)->slug('-');
        $rules = [
            'name' => 'required|max:255|unique:post_categories',
            'color' => 'required',
            'slug' => 'required|unique:post_categories'
        ];
        $request['slug'] = $slug;
        $validatedData = $request->validate($rules);
        PostCategory::create($validatedData);
        return redirect('/admin/post-categories')->with('success', 'New Post Category has been Created!');
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
        return view('admin.post-categories.edit', [
            'category' => $postCategory,
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $postCategory)
    {
        $rules = [
            'name' => 'required|max:255|unique:post_categories',
            'color' => 'required'
        ];

        if ($request->name === $postCategory->name && $request->color === $postCategory->color) {
            return redirect('/admin/post-categories')->with('warning', 'No post category data has changed!');
        }

        if ($request->name != $postCategory->name) {
            $slug = Str::of($request->name)->slug('-');
            $rules['slug'] = 'required|unique:post_categories';
            $request['slug'] = $slug;
        }
        $validatedData = $request->validate($rules);

        PostCategory::where('id', $postCategory->id)->update($validatedData);
        return redirect('/admin/post-categories')->with('success', 'Post Category has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        DB::table('posts')->where('category_id', $postCategory->id)->update(['category_id' => 1]);
        PostCategory::destroy($postCategory->id);
        return redirect('/admin/post-categories')->with('success', 'Post Category has been deleted!');
    }
}
