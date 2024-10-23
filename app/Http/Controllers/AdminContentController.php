<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Content!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.contents.index', [
            'contents' => Content::orderBy('created_at', 'DESC')->get(),
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
        return view('admin.contents.create', [
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
            'title' => 'required|unique:contents',
            'image' => 'required|image|file',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        $imageData = $request['image-cropper'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = 'content-image-' . time() . '.png';
        $validatedData['image'] = 'content-images/' . $imageName;
        file_put_contents(public_path('storage/content-images/' . $imageName), $imageData);

        Content::create($validatedData);
        return redirect('/admin/contents')->with('success', 'New content has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('admin.contents.edit', [
            'content' => $content,
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $rules = [
            'title' => 'required|unique:contents,title,' . $content->id,
            'image' => 'image|file',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        if ($request->file('image')) {
            Storage::delete($content->image);
            $imageData = $request['image-cropper'];
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = 'content-image-' . time() . '.png';
            $validatedData['image'] = 'content-images/' . $imageName;
            file_put_contents(public_path('storage/content-images/' . $imageName), $imageData);
        }

        $content->update($validatedData);
        return redirect('/admin/contents')->with('success', 'Content has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        Storage::delete($content->image);
        $content->delete();
        return redirect('/admin/contents')->with('success', 'Content has been deleted!');
    }
}
