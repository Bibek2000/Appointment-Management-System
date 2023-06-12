@extends('layouts.app')
@section('title','Create')


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
                                @if($pat->patient->image)
                                    <img style="border-radius: 100%; width: 180px; height: 180px" src="{{ asset('storage/images/'.$pat->patient->image) }}" alt="Avatar" class="my-5">
                                @else
                                    <img style="border-radius: 100%; width: 180px; height: 180px" src={{asset('public/images/default.jpeg')}} alt="Avatar" class="img-fluid my-5">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Profile Edit</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <form action="{{ route('patient.update.profile', $pat->id) }}" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <h6>Name</h6>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{ auth()->user()->name }}">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <input type="email" name="email" class="form-control" id="email" value="{{ auth()->user()->email }}" >
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Replace Image</h6>
                                                <div id="imagePreviewContainer" style="display: none;">
                                                    <img style="border-radius: 100%; width: 180px; height: 180px" id="imagePreview" src="#" alt="Image Preview">
                                                </div>
                                                <input onchange="previewImage(this)" oninput="this.className = ''" name="image" type="file">
                                            </div>
                                            <button type="submit" style="background-color: #22A699; float: right" class="btn text-white" >Update <i class="fa fa-edit"></i></button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);
                    $('#imagePreviewContainer').show();
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#imagePreview').attr('src', '#');
                $('#imagePreviewContainer').hide();
            }
        }
    </script>

@endsection



