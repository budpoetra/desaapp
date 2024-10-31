<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.settings.index', [
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
   * @param  \App\Http\Requests\StoreSettingRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreSettingRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function show(Setting $setting)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function edit(Setting $setting)
  {
    //
  }

  function pngToFavicon($sourcePath, $destinationPath)
  {
    // Load the PNG image
    $image = imagecreatefrompng($sourcePath);
    if (!$image) {
      die('Error loading PNG file.');
    }

    // Get the dimensions of the original image
    $width = imagesx($image);
    $height = imagesy($image);

    // Create a new blank image for the favicon
    $favicon = imagecreatetruecolor(48, 48);

    // Preserve transparency
    imagesavealpha($favicon, true);
    $transparency = imagecolorallocatealpha($favicon, 0, 0, 0, 127);
    imagefill($favicon, 0, 0, $transparency);

    // Resize the original image to favicon dimensions (48x48)
    imagecopyresampled($favicon, $image, 0, 0, 0, 0, 48, 48, $width, $height);

    // Save the image as .ico file
    imagewebp($favicon, $destinationPath, 100); // PHP doesn't have native support for .ico, so we'll use .webp
    imagedestroy($image);
    imagedestroy($favicon);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateSettingRequest  $request
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateSettingRequest $request, Setting $setting)
  {
    $rules = [
      'app_name' => 'required',
      'home_page_header_text' => 'required',
      'home_page_second_text' => 'required',
      'footer_text' => 'required',
      'footer_facebook' => 'required',
      'footer_instagram' => 'required',
      'footer_twitter' => 'required',
      'footer_whatsapp' => 'required',
      'footer_location' => 'required',
      'footer_copyright' => '',
    ];

    $validatedData = $request->validate($rules);

    if ($request->file('app_logo')) {
      $this->pngToFavicon($request->file('app_logo'), 'storage/favicon/favicon.ico');

      $imageData = $request['image-cropper-app-logo'];
      $imageData = str_replace('data:image/png;base64,', '', $imageData);
      $imageData = str_replace(' ', '+', $imageData);
      $imageData = base64_decode($imageData);
      $imageName = 'app-logo-' . time() . '.png';

      $validatedData['app_logo'] = 'logos/' . $imageName;

      file_put_contents(public_path('storage/logos/' . $imageName), $imageData);
      Storage::delete($setting->app_logo);
    }

    if ($request->file('app_logo_footer')) {
      $imageData = $request['image-cropper-app-logo-footer'];
      $imageData = str_replace('data:image/png;base64,', '', $imageData);
      $imageData = str_replace(' ', '+', $imageData);
      $imageData = base64_decode($imageData);
      $imageName = 'app-logo-footer-' . time() . '.png';

      $validatedData['app_logo_footer'] = 'logos/' . $imageName;

      file_put_contents(public_path('storage/logos/' . $imageName), $imageData);
      Storage::delete($setting->app_logo_footer);
    }

    if ($request->file('home_page_image')) {
      $imageData = $request['image-cropper-home-page-image'];
      $imageData = str_replace('data:image/png;base64,', '', $imageData);
      $imageData = str_replace(' ', '+', $imageData);
      $imageData = base64_decode($imageData);
      $imageName = 'home-page-' . time() . '.png';

      $validatedData['home_page_image'] = 'home-images/' . $imageName;

      file_put_contents(public_path('storage/home-images/' . $imageName), $imageData);
      Storage::delete($setting->home_page_image);
    }

    Setting::where('id', $setting->id)->update($validatedData);
    return redirect('/admin/settings')->with('success', 'Website settings successfully changed!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function destroy(Setting $setting)
  {
    //
  }
}
