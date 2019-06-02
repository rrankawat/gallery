@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-9">
      <h1>{{ $album->name }}</h1>
    </div>
    <div class="col-md-3">
      <a href="/" class="btn btn-success float-right">Go Back</a>
      <span class="float-right">&nbsp;&nbsp;</span>
      <a href="/photos/create/{{ $album->id }}" class="btn btn-primary float-right">Add Photos</a>
    </div>
  </div>
  <hr/>

  @if(count($album->photos) > 0)
    <div class="row">
      @foreach($album->photos as $photo)
        <div class="col-md-4">
          <p>
            <a href="/photos/{{ $photo->id }}">
              <img src="/storage/photos/{{ $album->id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}" class="img-thumbnail">
            </a>
          </p>
          <h5 class="text-center">{{ $photo->title }}</h5>
          <br/>
        </div>
      @endforeach
    </div>
  @endif
@endsection
