<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\Advertisement;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use Illuminate\Support\Facades\Storage;

class AdminAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Advertisement!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.advertisements.index', [
            'advertisements' => Advertisement::orderBy('created_at', 'DESC')->get(),
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
        return view('admin.advertisements.create', [
            'data' => Setting::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementRequest $request)
    {
        $rules = [
            'title' => 'required|unique:advertisements',
            'type' => 'required',
            'target' => 'required',
            'url' => 'required',
            'advertisement' => 'required|file|mimes:gif',
        ];

        $validatedData = $request->validate($rules);

        if ($validatedData['target'] === 'true') {
            $validatedData['target'] = true;
        } else {
            $validatedData['target'] = false;
        }

        $validatedData['advertisement'] = $request->file('advertisement')->store('ad-banners');
        $validatedData['slug'] = Str::of($request->title)->slug('-');

        Advertisement::create($validatedData);
        return redirect('/admin/advertisements',)->with('success', 'New advertisement has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisements.edit', [
            'advertisement' => $advertisement,
            'data' => Setting::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvertisementRequest  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        $rules = [
            'type' => 'required',
            'target' => 'required',
            'url' => 'required',
            'advertisement' => 'file|mimes:gif',
        ];

        if ($request->title !== $advertisement->title) {
            $rules['title'] = 'required|unique:advertisements';
        }

        $validatedData = $request->validate($rules);

        if ($validatedData['target'] === 'true') {
            $validatedData['target'] = true;
        } else {
            $validatedData['target'] = false;
        }

        if ($request->file('advertisement')) {
            $validatedData['advertisement'] = $request->file('advertisement')->store('ad-banners');
        }

        $validatedData['slug'] = Str::of($request->title)->slug('-');

        Advertisement::where('id', $advertisement->id)->update($validatedData);
        return redirect('/admin/advertisements',)->with('success', 'Advertisement has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        Advertisement::destroy($advertisement->id);
        Storage::delete($advertisement->advertisement);
        return redirect('/admin/advertisements',)->with('success', 'Advertisement has been deleted!!');
    }
}
