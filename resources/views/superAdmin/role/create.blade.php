@extends('layouts.app1');
@section('title', 'Create')
@section('Heading', 'Create')
@section('content')
    <style>
        .card{
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="card">
<form action="{{route('role.store')}}" method="post"  enctype="multipart/form-data" style="width: 40%">
    @csrf
    <div class="form-group role-class">
        <label for="role">Name</label>
        <input type="text" class="form-control" name="name" id="role" placeholder="Enter role" style="width: 30%">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
@endsection
