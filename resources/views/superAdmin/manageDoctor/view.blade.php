@extends('layouts.app1')
@section('Heading', 'Manage Doctors')
@section('content')

<h2 style="text-align:center">Doctor List</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">License No</th>
        <th scope="col">Department</th>
        <th scope="col">Approved status</th>

    </tr>
    </thead>
    <tbody>
    @foreach($doctors as $record)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$record->name}}</td>
            <td>{{$record->email}}</td>
            <td>{{$record->license_no}}</td>
            <td>{{$record->department}}</td>
            <td>
                <form id="toggle-form-{{$record->id}}" action="{{ route('toggle.approval', $record->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="button" onclick="toggleAppStatus({{$record->id}})" class="btn {{$record->approved_status ? 'btn-success' : 'btn-danger'}}">
                        {{$record->approved_status ? 'Approved' : 'Not Approved'}}
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    function toggleAppStatus(doctorId) {
        $('#toggle-form-' + doctorId).submit();
    }
</script>

@endsection
