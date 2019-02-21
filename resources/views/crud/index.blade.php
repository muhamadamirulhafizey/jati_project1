<!-- index.blade.php -->

@extends('master')
@section('content')


<div class="container">
<h4><a href="/crud">CRUD</a></h4>
</div>
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
      <!-- Search form -->
<input class="form-control" type="text" placeholder="Search" aria-label="Search">
<h3></h3>
       <!-- <th>ID</th> -->
        <th>Title</th>
        <th>Post</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cruds as $post)
      <tr>
       <!--  <td>{{$post['id']}}</td> -->
        <td><a href="{{action('PostController@show', $post['id'])}}">{{$post['title']}}</a></td>
        <td>{{$post['body']}}</td>
        <td><a href="{{action('PostController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PostController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <td><a href="crud/create" class="btn btn-primary">Create</a></td>
  </div>
@endsection