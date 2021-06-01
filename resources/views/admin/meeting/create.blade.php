@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Meeting') }}</div>

                    <a class="btn btn-secondary" href="{{ route('admin.meeting') }}">
                        {{ __('Back') }}
                    </a>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.meeting.store') }}" aria-label="{{ __('Create') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                        value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"
                                        class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        name="description" value="{{ old('description') }}" required>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meeting_date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                <div class="col-md-6">
                                    <input id="meeting_date" type="date"
                                        class="form-control{{ $errors->has('meeting_date') ? ' is-invalid' : '' }}"
                                        name="meeting_date" value="{{ old('meeting_date') }}" required maxlength="11"
                                        pattern="[0-9]+">

                                    @if ($errors->has('meeting_date'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('meeting_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meeting_start_time"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time Start') }}</label>

                                <div class="col-md-6">
                                    <input id="meeting_start_time" type="time"
                                        class="form-control{{ $errors->has('meeting_start_time') ? ' is-invalid' : '' }}"
                                        name="meeting_start_time" value="{{ old('meeting_start_time') }}" required
                                        maxlength="11" pattern="[0-9]+">

                                    @if ($errors->has('meeting_start_time'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('meeting_start_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meeting_end_time"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Time End') }}</label>

                                <div class="col-md-6">
                                    <input id="meeting_end_time" type="time"
                                        class="form-control{{ $errors->has('meeting_end_time') ? ' is-invalid' : '' }}"
                                        name="meeting_end_time" value="{{ old('meeting_end_time') }}" required>

                                    @if ($errors->has('meeting_end_time'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('meeting_end_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text"
                                        class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                                        name="location" value="{{ old('location') }}" required>

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sig"
                                    class="col-md-4 col-form-label text-md-right">{{ __('SIG Group') }}</label>
                                <div class="col-md-6">
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

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">Image</label>
                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" required>
                                    @if (auth()->user()->file)
                                        <code>{{ auth()->user()->file }}</code>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
