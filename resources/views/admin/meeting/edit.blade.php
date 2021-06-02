@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Meeting</div>
                    <a class="btn btn-secondary" href="{{ route('admin.meeting') }}">
                        {{ __('Back') }}
                    </a>
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
                                    <form action="{{ route('admin.meeting.update') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label text-md-right">Title</label>
                                            <div class="col-md-5">
                                                <input id="title" type="text" class="form-control" name="title" value="{{ old('name', $meeting->title) }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                                            <div class="col-md-5">
                                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description', $meeting->description) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="meeting_date" class="col-md-3 col-form-label text-md-right">Date</label>
                                            <div class="col-md-5">
                                                <input maxlength="11" id="meeting_date" type="date" class="form-control" name="meeting_date" value="{{ old('meeting_date',$meeting->meeting_date) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="meeting_start_time" class="col-md-3 col-form-label text-md-right">Time Start</label>
                                            <div class="col-md-5">
                                                <input id="meeting_start_time" type="time" class="form-control" name="meeting_start_time" value="{{ old('meeting_start_time',$meeting->meeting_start_time) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="meeting_end_time" class="col-md-3 col-form-label text-md-right">Time End</label>
                                            <div class="col-md-5">
                                                <input id="meeting_end_time" type="time" class="form-control" name="meeting_end_time" value="{{ old('meeting_end_time',$meeting->meeting_end_time) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sig" class="col-md-3 col-form-label text-md-right">SIG Group</label>
                                            <div class="col-md-5">
                                                <input id="sig" type="text" class="form-control" name="sig" value="{{ old('sig',$meeting->sig) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Update Meeting</button>
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