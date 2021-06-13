@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit {{ $meeting->title }} </div>
                    <a class="btn btn-secondary" href="{{ route('admin.meeting', $meeting->id) }}">
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
                                    <form action="{{ route('admin.meeting.update', $meeting->id) }}" method="POST"
                                        role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label text-md-right">Title</label>
                                            <div class="col-md-5">
                                                <input id="title" type="text" class="form-control" name="title"
                                                    value="{{ old('name', $meeting->title) }}" required autofocus>
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="description"
                                                class="col-md-3 col-form-label text-md-right">Description</label>
                                            <div class="col-md-5">
                                                <input id="description" type="text" class="form-control" name="description"
                                                    value="{{ old('description', $meeting->description) }}" required>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="meeting_date"
                                                class="col-md-3 col-form-label text-md-right">Date</label>
                                            <div class="col-md-5">
                                                <input maxlength="11" id="meeting_date" type="date" class="form-control"
                                                    name="meeting_date"
                                                    value="{{ old('meeting_date', $meeting->meeting_date) }}" required>
                                                @if ($errors->has('meeting_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('meeting_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="meeting_start_time"
                                                class="col-md-3 col-form-label text-md-right">Time Start</label>
                                            <div class="col-md-5">
                                                <input id="meeting_start_time" type="time" class="form-control"
                                                    name="meeting_start_time"
                                                    value="{{ old('meeting_start_time', $meeting->meeting_start_time) }}"
                                                    required>
                                                @if ($errors->has('meeting_start_time'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('meeting_start_time') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="meeting_end_time" class="col-md-3 col-form-label text-md-right">Time
                                                End</label>
                                            <div class="col-md-5">
                                                <input id="meeting_end_time" type="time" class="form-control"
                                                    name="meeting_end_time"
                                                    value="{{ old('meeting_end_time', $meeting->meeting_end_time) }}"
                                                    required>
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                                @if ($errors->has('meeting_end_time'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('meeting_end_time') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="location" class="col-md-3 col-form-label text-md-right">Location
                                            </label>
                                            <div class="col-md-5">
                                                <input id="location" type="text" class="form-control" name="location"
                                                    value="{{ old('location', $meeting->location) }}" required>
                                                @if ($errors->has('location'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('location') }}</strong>
                                                    </span>
                                                @endif
                                                @if ($errors->has('location'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('location') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        @hasrole('admin')
                                        <div class="form-group row">
                                            <label for="sig" class="col-md-3 col-form-label text-md-right">SIG Group</label>
                                            <div class="col-md-5">
                                                <select name="sig" class="form-control">
                                                    <option value="iMachine">iMachine</option>
                                                    <option value="i-Bisnes">i-Bisnes</option>
                                                    <option value="IMeC">IMeC</option>
                                                    <option value="MAD">MAD</option>
                                                    <option value="OSCApps">OSCApps</option>
                                                    <option value="ARVIS">ARVIS</option>
                                                    <option value="Imagine Cup">Imagine Cup</option>
                                                    <option value="PCC">PCC</option>
                                                    <option value="VIC">VIC</option>
                                                </select>
                                                @if ($errors->has('sig'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('sig') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        @endhasrole

                                        @hasrole('lecturer')
                                        <div class="form-group row">
                                            <label for="sig" class="col-md-3 col-form-label text-md-right">SIG Group
                                            </label>
                                            <div class="col-md-5">
                                                <input id="sig" type="text" class="form-control" name="sig"
                                                    value="{{ old('sig', auth()->user()->sig) }}" readonly required>
                                                @if ($errors->has('sig'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('sig') }}</strong>
                                                    </span>
                                                @endif
                                                @if ($errors->has('sig'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('sig') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        @endhasrole

                                        <div class="form-group row">
                                            <label for="file" class="col-md-3 col-form-label text-md-right">Image</label>
                                            <div class="col-md-5">
                                                <input id="file" type="file" class="form-control" name="file" required>
                                                @if (auth()->user()->file)
                                                    <code>{{ auth()->user()->file }}</code>
                                                @endif
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
