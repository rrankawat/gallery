@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-10 col-lg-10">
      <h1>Add Photos To "{{ $album->name }}"</h1>
    </div>
    <div class="col-md-2 col-lg-2">
      <a href="/albums/{{ $album->id }}" class="btn btn-success float-right">Go Back</a>
    </div>
  </div>

  <br/>
  {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Photo Title']) }}
    </div>
    <div class="form-group">
      {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Photo Description']) }}
    </div>
    {{ Form::hidden('album_id', $album->id) }}
    <div class="form-group">
      {{ Form::file('photo') }}
    </div>
    <div class="form-group">
      {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}
@endsection
