@extends('layouts.app1')
@section('title', 'Edit Role')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">S.N</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['records'] as $record)
        <tr>
            <th scope="row">{{$loop->index+1}}</th>
            <td>{{$record->name}}</td>
                <td><a href="{{route('role.edit', $record->id)}}" class="btn btn-warning edit-link">Edit</a>
                    <form action="{{route('role.destroy', $record->id)}}" method="post" style="display:inline-block">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                            Delete
                        </button>
                    </form>
                </td>
        </tr>
        </tbody>
        @endforeach
    </table>
@endsection
