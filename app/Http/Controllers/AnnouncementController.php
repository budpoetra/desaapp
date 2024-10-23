<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use App\Models\Announcement;
use App\Models\Advertisement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('announcements', [
            'announcements' => Announcement::latest()->filter(request(['search']))->paginate(7)->withQueryString(),
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
     * @param  \App\Http\Requests\StoreAnnouncementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnouncementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('single-announcement', [
            'announcement' => $announcement,
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'data' => Setting::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnouncementRequest  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }

    public function pdf(Announcement $announcement)
    {;
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf-announcement', [
            'announcement' => $announcement,
            'data' => Setting::all()
        ]);
        return $pdf->stream();
    }
}
