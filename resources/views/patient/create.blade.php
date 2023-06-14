@extends('patient.home')

@section('content')
<section id="appointment" class="appointment section-bg" style="margin-top: 80px">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form action="{{route('appointment.save')}}" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            @csrf
            <div class="row" style="display: flex; flex-direction: column; justify-content: center; align-content: center">
                <div class="col-md-4 form-group">
                    <label for="date">Select Date:</label>
                    <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required>
                    @error('date')
                    <p class="text text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="time">Select Time:</label>
                    <input type="time" name="time" class="form-control datepicker" id="date" placeholder="Appointment Time" required>
                    @error('time')
                    <p class="text text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="col-md-4 form-group mt-3">
                    <label for="time">Select Doctor:</label>
                    <select name="doctor_info" id="doctor" class="form-select">
                        <option value="" disabled>Select Doctor</option>

                        @foreach($doctor as $doc)
                            <option value="{{$doc->doctor->id}}">{{$doc->name}}/{{$doc->doctor->department}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <textarea class="form-control " name="message" rows="4" cols="40">Write your message here</textarea>
                </div>

            </div>

            <div class="text-center" style="margin-bottom: 8px;"><button style="background-color: #22A699" type="submit">Make an Appointment</button></div>

{{--            <div class="text-center"><a href="{{route('appointment.show')}}" class="btn btn-outline-warning" style="border-radius: 20px; color: #f0f0f0;" type="submit">View Appointments</a></div>--}}
        </form>
    </div>
</section><!-- End Appointment Section -->

{{--Appointment Details--}}
<section id="appointment" class="appointment section-bg">
    <div class="container" data-aos="fade-up">
        @if($data)
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
        @endif
    </div>
</section>

{{--Doctors section--}}
<section id="doctors" class="doctors section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Doctors</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
@foreach($doctor as $doc)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member shadow-lg" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img" style="height: 200px; width: 200px;">
                            <a href="{{route('doctor.select', $doc->id)}}">
                            @if($doc->doctor->image)
                                <img src="{{ asset('storage/images/'.$doc->doctor->image) }}" alt="Image" class="img-fluid" style="height: 100%">
                            @else
                                <img src={{asset('public/images/default.jpeg')}} alt="Image" class="img-fluid">
                            @endif
                            </a>
                        </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        <div class="member-info">
                            <h4>{{$doc->name}}</h4>
                            <span>{{$doc->doctor->department}}</span>
                        </div>
                    </div>
                </div>
@endforeach
        </div>

    </div>
</section><!-- End Doctors Section -->
    <script>
            var today = new Date().toISOString().split('T')[0];
            var maxDate = new Date();
            maxDate.setDate(maxDate.getDate() + 10);
            var maxDateFormatted = maxDate.toISOString().split('T')[0];
            document.getElementById("date").setAttribute('min', today);
            document.getElementById("date").setAttribute('max', maxDateFormatted);
    </script>
@endsection
