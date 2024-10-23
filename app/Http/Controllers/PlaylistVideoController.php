<?php

namespace App\Http\Controllers;

use App\Models\PlaylistVideo;
use App\Http\Requests\StorePlaylistVideoRequest;
use App\Http\Requests\UpdatePlaylistVideoRequest;

class PlaylistVideoController extends Controller
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
     * @param  \App\Http\Requests\StorePlaylistVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlaylistVideoRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlaylistVideoRequest  $request
     * @param  \App\Models\PlaylistVideo  $playlistVideo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlaylistVideoRequest $request, PlaylistVideo $playlistVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlaylistVideo  $playlistVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlaylistVideo $playlistVideo)
    {
        //
    }
}
