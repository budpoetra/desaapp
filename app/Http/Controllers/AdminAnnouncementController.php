<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Announcement!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.announcement.index', [
            'announcements' => Announcement::orderBy('created_at', 'DESC')->get(),
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
        return view('admin.announcement.create', [
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
            'title' => 'required|unique:announcements',
            'image' => 'image|file',
            'body' => 'required'
        ];

        $slug = Str::of($request->title)->slug('-');

        $validatedData = $request->validate($rules);
        $validatedData['image'] = $request->file('image')->store('announcement-images');
        $validatedData['slug'] = $slug;

        Announcement::create($validatedData);
        return redirect('/admin/announcements')->with('success', 'New announcement has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $title = 'Delete Announcement!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.announcement.show', [
            'announcement' => $announcement,
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
        return view('admin.announcement.edit', [
            'announcement' => $announcement,
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $rules = [
            'image' => 'image|file',
            'body' => 'required'
        ];

        if ($request->title != $announcement->title) {
            $rules['title'] =  'required|unique:announcements';
        }

        $slug = Str::of($request->title)->slug('-');
        $request['slug'] = $slug;
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            Storage::delete($announcement->image);
            $validatedData['image'] = $request->file('image')->store('announcement-images');
        }

        Announcement::where('id', $announcement->id)->update($validatedData);
        return redirect('/admin/announcements')->with('success', 'Announcement has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        Storage::delete($announcement->image);
        Announcement::destroy($announcement->id);
        return redirect('/admin/announcements')->with('success', 'Announcement has been deleted!');
    }
}
