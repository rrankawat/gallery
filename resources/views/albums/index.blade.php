@extends('layouts.app')

@section('content')
  <h1>Albums</h1><br/>

  @if(count($albums) > 0)
    <div class="row">
      @foreach($albums as $album)
        <div class="col-md-4">
          <p><a href="/albums/{{ $album->id }}"><img src="storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->cover_image }}" class="img-thumbnail"></a></p>
          <h5 class="text-center">{{ $album->name }}</h5>
          <br/>
        </div>
      @endforeach
    </div>
  @endif
@endsection
