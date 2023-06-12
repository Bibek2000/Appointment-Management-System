@extends('layouts.app');

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
                                @if($patient->image)
                                    <img style="border-radius: 100%; width: 180px; height: 180px" src="{{ asset('storage/images/'.$patient->image) }}" alt="Avatar" class="my-5">
                                @else
                                    <img style="border-radius: 100%; width: 180px; height: 180px" src={{asset('public/images/default.jpeg')}} alt="Avatar" class="img-fluid my-5" >
                                @endif
                                <h5>{{$patient->user->name}}</h5>
                                <a href="{{route('patient.edit.profile', $patient->user->id)}}"><i class="far fa-edit mb-5" style="color: blue"></i></a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Patient Profile</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <h6>Name</h6>
                                                <p class="text-muted">{{$patient->user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted">{{$patient->user->email}}</p>
                                            </div>
                                        </div>
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

@endsection
