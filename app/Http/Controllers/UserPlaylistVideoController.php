<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PlaylistVideo;
use Illuminate\Support\Facades\DB;

class UserPlaylistVideoController extends Controller
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

        return view('user.playlist-videos.index', [
            'playlistVideos' => PlaylistVideo::where('user_id', Auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
            'videos' => Video::all(),
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
        return view('user.playlist-videos.create', [
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
            'user_id' => 'required',
            'name' => 'required|unique:playlist_videos,name,NULL,id,user_id,' . $request->user_id,
        ];
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->name)->slug('-');

        PlaylistVideo::create($validatedData);
        return redirect('/user/playlist-videos')->with('success', 'New Playlist Videos has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlaylistVideo  $playlistVideo
     * @return \Illuminate\Http\Response
     */
    public function show(PlaylistVideo $playlistVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlaylistVideo  $playlistVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(PlaylistVideo $playlistVideo)
    {
        $this->authorize('update', $playlistVideo);
        return view('user.playlist-videos.edit', [
            'playlistVideo' => $playlistVideo,
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlaylistVideo  $playlistVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaylistVideo $playlistVideo)
    {
        $this->authorize('update', $playlistVideo);
        $rules = [
            'user_id' => 'required',
            'name' => 'required|unique:playlist_videos,name,' . $playlistVideo->id . ',id,user_id,' . $request->user_id,
        ];
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->name)->slug('-');

        $playlistVideo->update($validatedData);
        return redirect('/user/playlist-videos')->with('success', 'Playlist Videos has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaylistVideo  $playlistVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaylistVideo $playlistVideo)
    {
        $this->authorize('delete', $playlistVideo);
        DB::table('videos')->where('playlist_video_id', $playlistVideo->id)->update(['playlist_video_id' => null]);
        $playlistVideo->delete();
        return redirect('/user/playlist-videos')->with('success', 'Playlist Videos has been deleted!');
    }
}
