@if(session('status'))
<!-- session data  -->
  <div class="alert alert-success" style="margin-top:10px;">
    {{session('status')}}
  </div>
@endif
