<!-- edit.blade.php -->

@extends('master')
@section('content')
<div class="container">
<h4><a href="/crud">CRUD</a>><a href="#">Edit</a></h4>
</div>
<div class="container">
  <form method="post" action="{{action('PostController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" value="{{$crud->title}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Body</label>
      <div class="col-sm-10">
        <textarea name="body" rows="8" cols="80" >{{$crud->body}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Update</button>
      
      
    </div>
    <a href="/crud" class="btn btn-warning">Cancel</a>
  </form>
</div>
@endsection