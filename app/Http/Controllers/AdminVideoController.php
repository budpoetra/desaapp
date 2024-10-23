<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Video!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.videos.index', [
            'videos' => Video::orderBy('created_at', 'DESC')->get(),
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
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $title = 'Delete Video!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.videos.show', [
            'video' => $video,
            'data' => Setting::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', [
            'video' => $video,
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'source' => 'required',
            'body' => 'required',
        ];

        if ($request->title != $video->title) {
            $rules['title'] = 'unique:videos';
            $rules['slug'] = 'required';
            $request['slug'] = Str::of($request->title)->slug('-');
        }

        if ($request->source == 'upload' and $request->file('video')) {
            $rules['video'] = 'required|mimes:mp4|file';
        }

        $validatedData = $request->validate($rules);

        if ($request->source == 'youtube') {
            $validatedData['yt_link'] = $request->yt_link;

            Storage::delete($video->video);
            $validatedData['video'] = '';
            $validatedData['type'] = '';
        }

        if ($request->file('video')) {
            Storage::delete($video->video);
            $validatedData['yt_link'] = '';

            $validatedData['video'] = $request->file('video')->store('videos');
            $validatedData['type'] = $request->file('video')->getMimeType();
        }

        if ($request->file('image')) {
            Storage::delete($video->thumbnail);
            $imageData = $request['image-cropper'];
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = 'thumbnail-videos-' . time() . '.png';
            $validatedData['thumbnail'] = 'thumbnail-videos/' . $imageName;
            file_put_contents(public_path('storage/thumbnail-videos/' . $imageName), $imageData);
        }

        if ($request->is_popular == 'on') {
            $validatedData['is_popular'] = true;
        } else {
            $validatedData['is_popular'] = false;
        }

        Video::where('id', $video->id)->update($validatedData);
        return redirect('/admin/videos')->with('success', 'Video has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Video::destroy($video->id);
        return redirect('/admin/videos')->with('success', 'Video has been deleted!');
    }
}
