<!-- edit.blade.php -->

@extends('master')
@section('content')

<div class="container">
<h4><a href="/crud">CRUD</a>><a href="#">Post</a></h4>
<div>

<div class="container">
<table class="table table-striped">
    <thead>
      <tr>
       <!-- <th>ID</th> -->
        <th>Title</th>
        <th>Body</th>
        <th >Full Name </th>
        <th >Created at </th>
        <th >Updated at </th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

    
    @foreach ($crud as $crud)
    <tr>
    
    <td>{{$crud->title}}</td>
    <td>{{$crud->body}}</td>
    <td>{{$crud->name}}</td>
    
    
   

    
   


<td><a href="/crud" class="btn btn-warning">Cancel</a></td>
<td><a href="{{action('PostController@edit', $crud->id)}}" class="btn btn-warning">Edit</a></td>
<td>
<form action="{{action('PostController@destroy', $crud->id)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form></td>
</div>

</tr>
@endforeach
    </tbody>
    </table>
@endsection