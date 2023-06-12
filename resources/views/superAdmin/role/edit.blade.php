@extends('layouts.app1')
@section('title', 'Edit Role')
@section('content')
<form action="{{route('role.update',$data->id)}}" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="form-group">
        <label for="role">Name</label>
        <input type="text" class="form-control" name="name" id="role" value="{{$data->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
