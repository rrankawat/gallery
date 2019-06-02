<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use App\Album;

class PhotosController extends Controller
{
    public function create($album_id) {
      $album = Album::find($album_id);
      return view('photos.create')->with('album', $album);
    }

    public function store(Request $request) {
      $this->validate($request, [
        'title' => 'required',
        'photo' => 'image|max:1999'
      ]);

      // File name with extension
      $fileNameWithExt = $request->file('photo')->getClientOriginalName();

      // File name
      $fileName = 'IMG' . rand(1, 100) . '_' . time() . '.';

      // Get extension
      $extension = $request->file('photo')->getClientOriginalExtension();

      // Create new file name
      $fileNameToStore = $fileName . $extension;

      // Upload image
      $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $fileNameToStore);

      $photo = new Photo;
      $photo->album_id = $request->input('album_id');
      $photo->photo = $fileNameToStore;
      $photo->title = $request->input('title');
      $photo->size = $request->file('photo')->getClientSize();
      $photo->description = $request->input('description');
      $photo->save();

      return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo added');
    }

    public function show($id) {
      $photo = Photo::find($id);
      return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id) {
      $photo = Photo::find($id);

      if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
        $photo->delete();

        return redirect('/albums/'.$photo->album_id)->with('success', 'Photo deleted');
      }
    }

}
