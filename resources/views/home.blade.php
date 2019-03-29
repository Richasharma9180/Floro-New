@extends('layouts.app')
@section('content')
<html>
<head>
<style>
.center {
text-align: center;
}
.pagination {
justify-content: center;
}
.pagination a {
display: flex;
}
.pagination a:hover:not(.active) {
background-color: #ddd;
}
</style>
</head>
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<div><span class="float-sm-left h5">
User Management
</span> <a href="/users/create" class="btn btn-primary float-sm-right" style="margin-left: 10px;">
Create User Account
</a> <a href="{{ route('export_excel.excel') }}" class="btn btn-primary float-sm-right">
Export Users
</a>
<br/>
</div>
</div>
<div class="my-4">
<form action="/search" method="GET">
<div class="input-group">
<input class="form-control mr-sm-2" type="search" placeholder="Search by User Name,Email" name="search" aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
</div>
<div class="card-body">
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif
You are logged in!
<table class="table" id="myTable">
<thead class="thead-light">
<form method="GET" action="/home">
<tr>
<th scope="col">@sortablelink('user_name')</th>
<th scope="col">@sortablelink('first_name')</th>
<th scope="col">@sortablelink('last_name')</th>
<th scope="col">@sortablelink('email')</th>
<th scope="col">@sortablelink('created_at')</th>
<th scope="col">Last logIn At</th>
<th scope="col">Actions</th>
</tr>
</form>
</thead>
<tbody>
<div class="col-md-6 text-right">
@foreach($users as $user)
<tr>
<td>{{$user->user_name}}</td>
<td>{{$user->first_name}}</td>
<td>{{$user->last_name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->created_at}}</td>
<td>{{$user->updated_at}}</td>
<td><a class="nav-link active" href="/users/{{$user->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a></td>
<td>
<form method="POST" action="/users/{{$user->id}}">
@method('DELETE')
@csrf
<button type="submit" class="btn btn-danger">Delete</button>
</form></td>
</tr>
@endforeach
</tbody>
</table>
<div class="pagination-wrapper">
<a>{{ $users }}</a>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
</html>