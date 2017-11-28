@extends('layouts.master')
@section('content')
  <div class="col-sm-8 blog-main">
   <h1>Publish a Post</h1>
    <hr>
   <form method="POST" action="/posts">
       {{ csrf_field() }}
       <div class="form-group">
         @include('layouts.errors')
       </div>
       
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" id="title" name="title" />
  </div>

  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" name="body" rows="7" cols="70" id="body"></textarea>
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Publish</button>
  </div>

</form>
 </div>
@endsection
