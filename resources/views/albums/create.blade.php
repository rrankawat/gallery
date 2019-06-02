@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-10 col-lg-10">
      <h1>Create</h1>
    </div>
    <div class="col-md-2 col-lg-2">
      <a href="/" class="btn btn-success float-right">Go Back</a>
    </div>
  </div>

  <br/>
  {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Album Name']) }}
    </div>
    <div class="form-group">
      {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Album Description']) }}
    </div>
    <div class="form-group">
      {{ Form::file('cover_image') }}
    </div>
    <div class="form-group">
      {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}
@endsection
