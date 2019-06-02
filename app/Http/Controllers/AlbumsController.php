<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index() {
      $albums = Album::with('photos')->get();

      return view('albums.index')->with('albums', $albums);
    }

    public function create() {
      return view('albums.create');
    }

    public function store(Request $request) {
      $this->validate($request, [
        'name' => 'required',
        'cover_image' => 'image|max:1999'
      ]);

      // File name with extension
      $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

      // File name
      $fileName = 'IMG' . rand(1, 100) . '_' . time() . '.';

      // Get extension
      $extension = $request->file('cover_image')->getClientOriginalExtension();

      // Create new file name
      $fileNameToStore = $fileName . $extension;

      // Upload image
      $path = $request->file('cover_image')->storeAs('public/album_covers', $fileNameToStore);

      $album = new Album;
      $album->name = $request->input('name');
      $album->description = $request->input('description');
      $album->cover_image = $fileNameToStore;
      $album->save();

      return redirect('/albums')->with('success', 'Album created');
    }

    public function show($id) {
      $album = Album::with('photos')->find($id);
      return view('albums.show')->with('album', $album);
    }
}
