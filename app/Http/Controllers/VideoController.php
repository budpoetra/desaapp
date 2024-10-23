<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Video;
use App\Models\Content;
use App\Models\Setting;
use App\Models\Advertisement;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('videos', [
            'videos' => Video::latest()->filter(request(['search', 'user']))->paginate(24)->withQueryString(),
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
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
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
        return view('single-video', [
            'video' => $video,
            'videos' => Video::latest()->limit(4)->get(),
            'playlists' => Video::where('user_id', $video->user_id)->where('playlist_video_id', $video->playlist_video_id)->latest()->get(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
