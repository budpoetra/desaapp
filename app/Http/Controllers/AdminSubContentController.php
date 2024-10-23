<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use App\Models\SubContent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSubContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        confirmDelete('Delete Sub Content!', 'Are you sure you want to delete?');

        return view('admin.sub-contents.index', [
            'subContents' => SubContent::with('content')->orderBy('created_at', 'DESC')->get(),
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
        return view('admin.sub-contents.create', [
            'contents' => Content::all(),
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
            'content_id' => 'required',
            'title' => 'required|unique:sub_contents',
            'image' => 'required|image|file',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        $imageData = $request['image-cropper'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = 'sub-content-image-' . time() . '.png';
        $validatedData['image'] = 'content-images/' . $imageName;
        file_put_contents(public_path('storage/content-images/' . $imageName), $imageData);

        SubContent::create($validatedData);
        return redirect('/admin/sub-contents')->with('success', 'New sub content has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubContent  $subContent
     * @return \Illuminate\Http\Response
     */
    public function show(SubContent $subContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubContent  $subContent
     * @return \Illuminate\Http\Response
     */
    public function edit(SubContent $subContent)
    {
        return view('admin.sub-contents.edit', [
            'subContent' => $subContent,
            'contents' => Content::all(),
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubContent  $subContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubContent $subContent)
    {
        $rules = [
            'content_id' => 'required',
            'title' => 'required|unique:sub_contents,title,' . $subContent->id,
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        if ($request->hasFile('image')) {
            Storage::delete($subContent->image);
            $imageData = $request['image-cropper'];
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = 'sub-content-image-' . time() . '.png';
            $validatedData['image'] = 'content-images/' . $imageName;
            file_put_contents(public_path('storage/content-images/' . $imageName), $imageData);
        }

        $subContent->update($validatedData);
        return redirect('/admin/sub-contents')->with('success', 'Sub content has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubContent  $subContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubContent $subContent)
    {
        Storage::delete($subContent->image);
        $subContent->delete();
        return redirect('/admin/sub-contents')->with('success', 'Sub content has been deleted!');
    }
}
