@extends('layouts.app')


@section('title','Trainer ')

@section('content')

@include('common.success')

<div class="col-sm">
  <div class="card text-center" style="width: 18rem; margin-top:50px;">
    <img src="/images/{{$trainer->avatar}}" alt="" class="card-img-top rounded-circle mx-auto d-block"  style="width:100px;height:100px; background-color:#EFEFEF; margin: 20px; ">
    <div class="card-body">
      <h5 class="card-title">{{$trainer->name}}</h5>
      <p class="card-text">{{$trainer->description}}</p>
      <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar </a>
      <form method="POST" action="/trainers/{{$trainer->slug}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group">
          <input type="submit" class="btn btn-danger" value="Eliminar">
        </div>
      </form>﻿

    </div>
  </div>
</div>



@endsection
