@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Meeting Details</div>
                    <a class="btn btn-secondary" href="{{ route('home') }}">
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
                                    <div class="card mb-3">
                                        <img src="{{ asset('storage/images/'.$meeting->file_path) }}" class="card-img-top" height="750px" width="700px">
                                        <br>
                                        <div class="card text-center">
                                            <div class="card-header">
                                            </div>
                                            <div class="card-body">
                                              <h3 class="card-title">Title: {{$meeting->title}}</h3>
                                              <p class="card-text">Description: {{$meeting->description}}</p>
                                              <p class="card-text">Date: {{ \Carbon\Carbon::parse($meeting->meeting_date)->format('d/m/Y') }}</p>
                                              <p class="card-text">Time Start: {{ \Carbon\Carbon::parse($meeting->meeting_start_time)->format('g:i a') }}</p>
                                              <p class="card-text">Time End: {{ \Carbon\Carbon::parse($meeting->meeting_end_time)->format('g:i a') }}</p>
                                              <p class="card-text">Location: {{$meeting->location}}</p>
                                              <p class="card-text">SIG: {{$meeting->sig}}</p>
                                             
                                              @if ($current_date_time = \Carbon\Carbon::now() > $meeting->meeting_date)
                                                    <h3 class="card-title">Meeting Has Expired</h3>
                                                @else
                                                    <form action="{{ route('meeting.attend') }}" method="POST">
                                                        <input id="attendance" type="hidden" value="attend"
                                                            name="attendance">
                                                        <input id="meeting_id" type="hidden" value="{{ $meeting->id }}"
                                                            name="meeting_id">
                                                        @csrf
                                                        <button type="submit" class="btn btn-secondary">Attend</button>
                                                    </form>
                                                @endif
                                            </div>
                                            <div class="card-footer text-muted">
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
