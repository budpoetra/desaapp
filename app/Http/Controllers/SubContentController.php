<?php

namespace App\Http\Controllers;

use App\Models\SubContent;
use App\Http\Requests\StoreSubContentRequest;
use App\Http\Requests\UpdateSubContentRequest;

class SubContentController extends Controller
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
     * @param  \App\Http\Requests\StoreSubContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubContentRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubContentRequest  $request
     * @param  \App\Models\SubContent  $subContent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubContentRequest $request, SubContent $subContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubContent  $subContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubContent $subContent)
    {
        //
    }
}
