@extends('layouts.app1');

@section('content')
    <section class="h-80 gradient-custom-2">
        <div class="container py-5 h-80">
            <div class="row d-flex justify-content-center align-items-center h-80">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                    <img src={{asset('public/images/default.jpeg')}} alt="Image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                        style="z-index: 1;">
                                    <a href="{{route('admin.edit.profile', auth()->user()->id)}}" style="text-decoration: none;">Edit profile</a>
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{auth()->user()->name}}</h5>
                                <p>{{auth()->user()->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

