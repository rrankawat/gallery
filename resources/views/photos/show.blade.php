@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-10">
      <h3>{{ $photo->title }}</h3>
    </div>
    <div class="col-md-2">
      <a href="/albums/{{ $photo->album_id }}" class="btn btn-success float-right">Go Back</a>
      {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'DELETE']) !!}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
      {!! Form::close() !!}
    </div>
  </div>

  <p>{{ $photo->description }}</p>
  <hr>

  <img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
  <hr>
  <p>Size: {{ $photo->size }}</p>
@endsection
