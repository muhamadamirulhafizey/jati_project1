<!-- create.blade.php -->

@extends('master')
@section('content')
<div class="container">
<h4><a href="/crud">CRUD</a>><a href="#">Create</a></h4>
</div>

<div class="container">
  <form method="post" action="{{url('crud')}}">
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Body</label>
      <div class="col-sm-10">
        <textarea name="body" rows="8" cols="80" required></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
      <!-- <button href="/crud" class="btn btn-warning">Cancel</button> -->
      <button class="btn btn-warning"><a href="/crud">Back</a></button>
    </div>
  </form>
</div>
@endsection