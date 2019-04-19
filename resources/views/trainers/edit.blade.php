@extends('layouts.app')


@section('title','Trainer Edit')

@section('content')

<form class="form-group" action="/trainers/{{$trainer->slug}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  <!-- oculta la inforamcio -->
  @csrf

  @include('common.erros')

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" value="{{$trainer->name}}" class="form-control" >
    <label for="">Description</label>
    <input type="text" name="description" value="{{$trainer->description}}" class="form-control" >
  </div>
  <div class="form-group">
    <label for="">Avatar</label>
    <input type="file" name="avatar" value="">
  </div>
  <button type="submit" name="button" class="btn btn-primary">Actualiazr</button>
</form>


@endsection
