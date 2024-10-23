<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Content;
use App\Models\Setting;
use App\Models\Advertisement;
use App\Models\EbookCategory;
use App\Http\Requests\StoreEbookRequest;
use App\Http\Requests\UpdateEbookRequest;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ebooks', [
            'ebooks' => Ebook::latest()->filter(request(['search', 'category', 'user']))->paginate(12)->withQueryString(),
            'categories' => EbookCategory::latest()->get(),
            'allEbooks' => Ebook::all(),
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
     * @param  \App\Http\Requests\StoreEbookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEbookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function show(Ebook $ebook)
    {
        return view('single-ebook', [
            'ebook' => $ebook,
            'categories' => EbookCategory::latest()->get(),
            'allEbooks' => Ebook::all(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'data' => Setting::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Ebook $ebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEbookRequest  $request
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEbookRequest $request, Ebook $ebook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebook $ebook)
    {
        //
    }

    public function read(Ebook $ebook)
    {
        return view('read-ebook', [
            'ebook' => $ebook,
            'categories' => EbookCategory::latest()->get(),
            'allEbooks' => Ebook::all(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'data' => Setting::all()
        ]);
    }
}
