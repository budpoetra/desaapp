<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EbookCategory;
use Illuminate\Support\Facades\Storage;

class UserEbookController extends Controller
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

        return view('user.ebooks.index', [
            'ebooks' => Ebook::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
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
        return view('user.ebooks.create', [
            'categories' => EbookCategory::all(),
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
        ddd($request);
        $rules = [
            'title' => 'required|unique:ebooks',
            'category_id' => 'required',
            'ebook' => 'required|mimes:pdf|file',
            'image' => 'required|image|file',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::of($request->title)->slug('-');
        $validatedData['ebook'] = $request->file('ebook')->store('ebook-files');
        $validatedData['type'] = $request->file('ebook')->getMimeType();
        $validatedData['user_id'] = auth()->user()->id;

        $imageData = $request['image-cropper'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = 'ebook-image-' . time() . '.png';
        $validatedData['image'] = 'ebook-images/' . $imageName;
        file_put_contents(public_path('storage/ebook-images/' . $imageName), $imageData);

        Ebook::create($validatedData);
        return redirect('/user/ebooks')->with('success', 'New ebook has been added!');
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

        return view('user.ebooks.show', [
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
        $this->authorize('update', $ebook);
        return view('user.ebooks.edit', [
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
        $this->authorize('update', $ebook);
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

        $validatedData['user_id'] = auth()->user()->id;

        Ebook::where('id', $ebook->id)->update($validatedData);
        return redirect('/user/ebooks')->with('success', 'Ebook has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebook $ebook)
    {
        $this->authorize('delete', $ebook);
        Storage::delete($ebook->image);
        Storage::delete($ebook->ebook);
        Ebook::destroy($ebook->id);
        return redirect('/user/ebooks')->with('success', 'Ebook has been deleted!');
    }
}
