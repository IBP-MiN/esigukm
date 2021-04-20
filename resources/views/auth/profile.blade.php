@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
                                            <div class="col-md-5">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="matric_no" class="col-md-3 col-form-label text-md-right">Matric Number</label>
                                            <div class="col-md-5">
                                                <input id="matric_no" type="text" class="form-control" name="matric_no" value="{{ old('matric_no', auth()->user()->matric_no) }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phone_no" class="col-md-3 col-form-label text-md-right">Phone Number</label>
                                            <div class="col-md-5">
                                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no', auth()->user()->phone_no) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                                            <div class="col-md-5">
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sig" class="col-md-3 col-form-label text-md-right">SIG Group</label>
                                            <div class="col-md-5">
                                                <input id="sig" type="text" class="form-control" name="sig" value="{{ old('sig', auth()->user()->sig) }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection