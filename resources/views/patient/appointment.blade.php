@extends('patient.home')

@section('content')
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #22A699;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, #22A699, #7ED9C3);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, #22A699, #7ED9C3);
    }
</style>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3 shadow-lg" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white">
                                @if($doc->doctor->image)
                                    <img style="border-radius: 100%; width: 180px; height: 180px" src="{{ asset('storage/images/'.$doc->doctor->image) }}" alt="Avatar" class="my-5">
                                @else
                                    <img style="border-radius: 100%; width: 180px; height: 180px" src={{asset('public/images/default.jpeg')}} alt="Avatar" class="img-fluid my-5">
                                @endif
                                <h5>{{$doc->name}}</h5>
                                <p>{{$doc->doctor->department}}</p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Appointment Form</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <form action="{{route('appointment.save')}}" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <h6>Appointment Date</h6>
                                                    <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required>
                                                    @error('date')
                                                    <p class="text text-danger">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Appointment Time</h6>
                                                    <input type="time" name="time" class="form-control datepicker" id="date" placeholder="Appointment Time" required>
                                                    @error('time')
                                                    <p class="text text-danger">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Doctor</h6>
                                                <select name="doctor_info" id="doctor" class="form-select">
                                                    <option value="{{$doc->doctor->id}}">{{$doc->name}}/{{$doc->doctor->department}}</option>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Description:</h6>
                                                <textarea class="p-2" name="message" rows="4" cols="40">Write your message here</textarea>
                                            </div>
                                            <button type="submit" style="background-color: #22A699; float: right" class="btn text-white">Make an Appointment</button>
                                        </form>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3" style="background-color: #22A699"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3" style="background-color: #22A699"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg" style="background-color: #22A699"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    var today = new Date().toISOString().split('T')[0];
    var maxDate = new Date();
    maxDate.setDate(maxDate.getDate() + 10);
    var maxDateFormatted = maxDate.toISOString().split('T')[0];
    document.getElementById("date").setAttribute('min', today);
    document.getElementById("date").setAttribute('max', maxDateFormatted);
</script>
@endsection
