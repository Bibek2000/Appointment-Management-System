@extends('layouts.app2');

@section('content')

        <section class="h-80 gradient-custom-2">
            <div class="container py-5 h-80">
                <div class="row d-flex justify-content-center align-items-center h-80">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card shadow-lg">
                            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                    @if($doctor->image)
                                        <img src="{{ asset('storage/images/'.$doctor->image) }}" alt="Image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                    @else
                                        <img src={{asset('public/images/default.jpeg')}} alt="Image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                    @endif
                                    <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                            style="z-index: 1;">
                                        <a href="{{route('doctor.edit.profile', $doctor->user->id)}}" style="text-decoration: none;">Edit profile</a>
                                    </button>
                                </div>
                                <div class="ms-3" style="margin-top: 130px;">
                                    <h5>{{$doctor->user->name}}</h5>
                                    <p>{{ $doctor->department }}</p>
                                </div>
                            </div>
                            <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-end text-center py-1">
                                    <div>
                                        <h3 class="mb-1 h5">{{$appointmentCount}}</h3>
                                        <h3 class="small text-muted mb-0">Appointments</h3>
                                    </div>
                                    <div class="px-3">
                                        <h3 class="mb-1 h5" style="color: green">{{ $approvedStatusCount}}</h3>
                                        <h3 class="small text-muted mb-0">Approved</h3>
                                    </div>
                                    <div>
                                        <h3 class="mb-1 h5" style="color: red">{{$notApprovedStatusCount}}</h3>
                                        <h3 class="small text-muted mb-0">Not Approved</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">About</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        <p class="font-italic mb-1">{{$doctor->user->email}}</p>
                                        <p class="font-italic mb-1">License No. : {{ $doctor->license_no }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection


{{--<div class="profile">--}}
{{--    <h1 class="title">Doctor PROFILE</h1>--}}
{{--    <div class="image">--}}
{{--        @if($doctor->image)--}}
{{--            <img src="{{ asset('storage/images/'.$doctor->image) }}" alt="Image" height="100" width="100">--}}
{{--        @else--}}
{{--            <img src={{asset('public/images/default.jpeg')}} alt="Image" height="100" width="100">--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <p>Name: {{$doctor->user->name}}</p>--}}
{{--    <p>Email: {{$doctor->user->email}}</p>--}}
{{--    <p>Department: {{ $doctor->department }}</p>--}}
{{--    <p>License: {{ $doctor->license_no }}</p>--}}
{{--    <p>No. of appointments: {{$appointmentCount}}</p>--}}
{{--    <div>--}}
{{--        <a href="{{route('doctor.edit.profile', $doctor->user->id)}}"class="btn btn-outline-success">Edit Profile<i class="fa fa-edit"></i></a>--}}

{{--    </div>--}}
{{--</div>--}}
