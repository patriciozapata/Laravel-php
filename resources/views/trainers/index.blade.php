@extends('layouts.app')


@section('title','Trainer ')

@section('content')
<div class="row">
@foreach ($trainers as $trainer)



  <div class="col-sm">
    <div class="card text-center" style="width: 18rem; margin-top:50px;">
      <img src="images/{{$trainer->avatar}}" alt="" class="card-img-top rounded-circle mx-auto d-block"  style="width:100px;height:100px; background-color:#EFEFEF; margin: 20px; ">
      <div class="card-body">
        <h5 class="card-title">{{$trainer->name}}</h5>
        <p class="card-text">{{$trainer->description}}</p>
        <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver mas </a>
      </div>
    </div>
  </div>


@endforeach
</div>



@endsection
