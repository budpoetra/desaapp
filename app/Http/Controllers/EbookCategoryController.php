<?php

namespace App\Http\Controllers;

use App\Models\EbookCategory;
use App\Http\Requests\StoreEbookCategoryRequest;
use App\Http\Requests\UpdateEbookCategoryRequest;

class EbookCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreEbookCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEbookCategoryRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEbookCategoryRequest  $request
     * @param  \App\Models\EbookCategory  $ebookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEbookCategoryRequest $request, EbookCategory $ebookCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EbookCategory  $ebookCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EbookCategory $ebookCategory)
    {
        //
    }
}
