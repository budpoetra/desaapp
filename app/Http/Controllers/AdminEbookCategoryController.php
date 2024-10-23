<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EbookCategory;
use Illuminate\Support\Facades\DB;

class AdminEbookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Ebook Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.ebook-categories.index', [
            'categories' => EbookCategory::all(),
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
        return view('admin.ebook-categories.create', [
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
        EbookCategory::create($validatedData);
        return redirect('/admin/ebook-categories')->with('success', 'New Ebook Category has been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EbookCategory  $ebookCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EbookCategory $ebookCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EbookCategory  $ebookCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(EbookCategory $ebookCategory)
    {
        return view('admin.ebook-categories.edit', [
            'category' => $ebookCategory,
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EbookCategory  $ebookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EbookCategory $ebookCategory)
    {
        $rules = [
            'name' => 'required|max:255|unique:ebook_categories',
            'color' => 'required'
        ];

        if ($request->name === $ebookCategory->name && $request->color === $ebookCategory->color) {
            return redirect('/admin/ebook-categories')->with('warning', 'No post category data has changed!');
        }

        if ($request->name != $ebookCategory->name) {
            $slug = Str::of($request->name)->slug('-');
            $rules['slug'] = 'required|unique:ebook_categories';
            $request['slug'] = $slug;
        }
        $validatedData = $request->validate($rules);

        EbookCategory::where('id', $ebookCategory->id)->update($validatedData);
        return redirect('/admin/ebook-categories')->with('success', 'Ebook Category has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EbookCategory  $ebookCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EbookCategory $ebookCategory)
    {
        DB::table('ebooks')->where('category_id', $ebookCategory->id)->update(['category_id' => 1]);
        EbookCategory::destroy($ebookCategory->id);
        return redirect('/admin/ebook-categories')->with('success', 'Ebook Category has been deleted!');
    }
}
