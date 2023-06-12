@extends('layouts.app1')
@section('title','Create')


@section('content')
    <form action="{{ route('patient.update.profile', $pat->id) }}" method="POST" id="regForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="image">
                                    @if($pat->image)
                                        <img src="{{ asset('images/'.$pat->image) }}" alt="Student Image" height="100px" width="100">
                                    @else
                                        <img src="{{ asset('images/default.jpeg') }}" alt="Image" height="50" width="50">
                                    @endif
                                    <p>Replace Image</p>
                                    <div id="imagePreviewContainer" style="display: none;">
                                        <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                    <input onchange="previewImage(this)" oninput="this.className = ''" name="image" type="file">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="department">{{ __('Department') }}</label>
                                <input id="department" type="text" class="form-control" name="department" value="{{ $pat->doctor->department }}" required>
                            </div>

                            <div class="form-group">
                                <label for="license_no">{{ __('License') }}</label>
                                <input id="license_no" type="number" class="form-control" name="license_no" value="{{ $pat->doctor->license_no }}" required>
                            </div>

                            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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



