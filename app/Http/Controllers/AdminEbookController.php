<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EbookCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminEbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Ebook!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.ebooks.index', [
            'ebooks' => Ebook::orderBy('created_at', 'DESC')->get(),
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
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function show(Ebook $ebook)
    {
        $title = 'Delete Ebook!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.ebooks.show', [
            'ebook' => $ebook,
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
        return view('admin.ebooks.edit', [
            'ebook' => $ebook,
            'categories' => EbookCategory::all(),
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ebook $ebook)
    {
        $rules = [
            'category_id' => 'required',
            'image' => 'image|file',
            'body' => 'required',
        ];

        if ($request->title != $ebook->title) {
            $rules['title'] = 'unique:ebooks';
            $rules['slug'] = 'required';
            $request['slug'] = Str::of($request->title)->slug('-');
        }

        $validatedData = $request->validate($rules);

        if ($request->download) {
            $validatedData['download'] = true;
        } else {
            $validatedData['download'] = false;
        }

        if ($request->file('image')) {
            Storage::delete($ebook->image);
            $imageData = $request['image-cropper'];
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = 'ebook-image-' . time() . '.png';
            $validatedData['image'] = 'ebook-images/' . $imageName;
            file_put_contents(public_path('storage/ebook-images/' . $imageName), $imageData);
        }

        Ebook::where('id', $ebook->id)->update($validatedData);
        return redirect('/admin/ebooks')->with('success', 'Ebook has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebook $ebook)
    {
        Ebook::destroy($ebook->id);
        return redirect('/admin/ebooks')->with('success', 'Ebook has been deleted!');
    }
}
