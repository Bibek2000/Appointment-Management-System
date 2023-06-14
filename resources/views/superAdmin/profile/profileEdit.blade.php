@extends('layouts.app1')
@section('title','Create')


@section('content')
    <form action="{{ route('admin.update.profile', $admin->id) }}" method="POST" id="regForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="image">
                                        <img src="{{ asset('images/default.jpeg') }}" alt="Image" height="50" width="50">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required autofocus>
                                @error('name')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                                @error('email')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
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



