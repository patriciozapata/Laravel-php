@if($errors->any())

<div class="alert alert-danger" style="margin-top:5px;">
  <ul>
    @foreach($errors->all() as $error)
    <li>  {{$error}}</li>
    @endforeach
  </ul>
</div>

@endif
