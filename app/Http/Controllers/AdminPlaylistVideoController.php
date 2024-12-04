<?php

namespace App\Http\Controllers;

use App\Models\PlaylistVideo;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPlaylistVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Playlist Video!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.playlist-videos.index', [
            'videos' => Video::all(),
            'playlistVideos' => PlaylistVideo::orderBy('created_at', 'DESC')->get(),
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
     * @param  \App\Models\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaylistVideo $playlistVideo)
    {
        return view('admin.playlist-videos.edit', [
            'playlistVideo' => $playlistVideo,
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
    public function update(Request $request, PlaylistVideo $playlistVideo)
    {
        $rules = [
            'name' => 'required|unique:playlist_videos,name,' . $playlistVideo->id . ',id,user_id,' . $playlistVideo->user_id,
        ];
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->name)->slug('-');

        $playlistVideo->update($validatedData);
        return redirect('/admin/playlist-videos')->with('success', 'Playlist Videos has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaylistVideo $playlistVideo)
    {
        DB::table('videos')->where('playlist_video_id', $playlistVideo->id)->update(['playlist_video_id' => null]);
        $playlistVideo->delete();
        return redirect('/admin/playlist-videos')->with('success', 'Playlist Videos has been deleted!');
    }
}
