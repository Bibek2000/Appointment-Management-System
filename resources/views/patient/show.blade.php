@extends('patient.home')
@section('content')
    {{--Appointment Details sections--}}
        <section id="appointment" class="appointment section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Appointment Details</h2>
                </div>
                <div class="row" >
                    <table class="table table-bordered">
                        <tr>
                            <th>Doctor name</th>
                            <th>Department</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->doctor->user->name}}</td>
                                <td>{{$item->doctor->department}}</td>
                                <td>{{$item->appointment_date}}</td>
                                <td>{{$item->appointment_time}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    @if($item->status==1)
                                        <p style="color: #22A699">Approved</p>
                                    @else
                                        <p style="color: red">Not Approved</p>
                                    @endif
                                </td>
                                <td><form action="{{ route('appointments.destroy', $item->id) }}" method="post" style="display:inline-block">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-block btn-danger sa-warning remove_row">
                                            Delete
                                        </button>
                                    </form></td>
                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </section>
@endsection
