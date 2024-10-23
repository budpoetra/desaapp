<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SubContent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubSubContent;
use Illuminate\Support\Facades\Storage;

class AdminSubSubContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        confirmDelete('Delete Sub Content!', 'Are you sure you want to delete?');
        return view('admin.sub-sub-contents.index', [
            'subSubContents' => SubSubContent::with('subContent')->orderBy('created_at', 'DESC')->get(),
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
        return view('admin.sub-sub-contents.create', [
            'subContents' => SubContent::all(),
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
            'sub_content_id' => 'required',
            'title' => 'required|unique:sub_sub_contents',
            'image' => 'required|image|file',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        $imageData = $request['image-cropper'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = 'sub-sub-content-image-' . time() . '.png';
        $validatedData['image'] = 'content-images/' . $imageName;
        file_put_contents(public_path('storage/content-images/' . $imageName), $imageData);

        SubSubContent::create($validatedData);
        return redirect('/admin/sub-sub-contents')->with('success', 'New sub sub content has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubSubContent  $subSubContent
     * @return \Illuminate\Http\Response
     */
    public function show(SubSubContent $subSubContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubSubContent  $subSubContent
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSubContent $subSubContent)
    {
        return view('admin.sub-sub-contents.edit', [
            'subSubContent' => $subSubContent,
            'subContents' => SubContent::all(),
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubSubContent  $subSubContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSubContent $subSubContent)
    {
        $rules = [
            'sub_content_id' => 'required',
            'title' => 'required|unique:sub_sub_contents,title,' . $subSubContent->id,
            'image' => 'image|file',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        if ($request->hasFile('image')) {
            Storage::delete($subSubContent->image);
            $imageData = $request['image-cropper'];
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = 'sub-sub-content-image-' . time() . '.png';
            $validatedData['image'] = 'content-images/' . $imageName;
            file_put_contents(public_path('storage/content-images/' . $imageName), $imageData);
        }

        $subSubContent->update($validatedData);
        return redirect('/admin/sub-sub-contents')->with('success', 'Sub sub content has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubSubContent  $subSubContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSubContent $subSubContent)
    {
        Storage::delete($subSubContent->image);
        $subSubContent->delete();
        return redirect('/admin/sub-sub-contents')->with('success', 'Sub sub content has been deleted!');
    }
}
