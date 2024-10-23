<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\SubContent;
use App\Models\SubSubContent;

class ContentController extends Controller
{
    public function show(Content $content)
    {
        return view('content', [
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'content' => Content::with(['subContents'])->where('slug', $content->slug)->get(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'data' => Setting::all()
        ]);
    }

    public function subshow(SubContent $subContent)
    {
        return view('sub-content', [
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'subContent' => SubContent::with(['content', 'subSubContents'])->where('slug', $subContent->slug)->get(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'data' => Setting::all()
        ]);
    }

    public function subsubshow(SubSubContent $subSubContent)
    {
        return view('sub-sub-content', [
            'contents' => Content::with(['subContents', 'subContents.subSubContents'])->get(),
            'subSubContent' => SubSubContent::with(['SubContent.content', 'SubContent'])->where('slug', $subSubContent->slug)->get(),
            'primaryAds' => Advertisement::where('type', 'primary')->get(),
            'secondaryAds' => Advertisement::where('type', 'seccondary')->get(),
            'data' => Setting::all()
        ]);
    }
}
