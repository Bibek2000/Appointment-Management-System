@extends('layouts.app2')
@section('content')

    <h2 style="text-align:center">Appointment Index</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Patient</th>
            <th scope="col">Email</th>
            <th scope="col">Department</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{$loop->index+1}}</td>
                <th scope="col">{{$record->patient->user->name}}</th>
                <th scope="col">{{$record->patient->user->email}}</th>
                <td>{{$record->doctor->department}}</td>
                <td>{{$record->appointment_date}}</td>
                <td>{{$record->appointment_time}}</td>
                <td>
                    <form id="toggle-form-{{$record->id}}" action="{{ route('patient.status.approval', $record->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="btn {{$record->status ? 'btn-success' : 'btn-danger'}}" onclick="toggleAppStatus({{$record->id}})">
                            {{$record->status ? 'Approved' : 'Not Approved'}}
                        </button>
                    </form>
                </td>



                <td>

                    <form action="{{ route('doctors.appointments.destroy', $record->id) }}" method="post" style="display:inline-block">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                            Delete</i>
                        </button>
                    </form>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function toggleAppStatus(appointmentId) {
            $('#toggle-form-' + appointmentId).submit();
        }
    </script>
@endsection
