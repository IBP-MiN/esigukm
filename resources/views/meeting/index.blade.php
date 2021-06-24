@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My meetings</div>

                    <div class="card-body">
                        <form action="{{ route('meeting.search') }}" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" required
                                    placeholder="Search meeting by Title"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info">
                                        Search
                                    </button>
                                </span>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time Start</th>
                                    <th scope="col">Time End</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">SIG</th>
                                    <th scope="col">Attend</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    @foreach ($attends as $attend)
                                        @if ($meeting->id == $attend->meeting_id && Auth::user()->sig == $meeting->sig && $attend->user_id == Auth::user()->id)
                                            <tr>
                                                <th>{{ $meeting->title }}</th>
                                                <th>{{ $meeting->description }}</th>
                                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('d/m/Y') }}
                                                </th>
                                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_start_time)->format('g:i a') }}
                                                </th>
                                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_end_time)->format('g:i a') }}
                                                </th>
                                                <th>{{ $meeting->location }}</th>
                                                <th>{{ $meeting->sig }}</th>

                                                @if ($attend->attendance == 'attend' && $attend->meeting_id == $meeting->id && Auth::user()->id == $attend->user_id)
                                                    <th>Attend</th>
                                                @else
                                                    <th>Not Attend</th>
                                                @endif
                                                <th>
                                                    <a href="{{ route('meeting.details', $meeting->id) }}"
                                                        class="float-left">
                                                        <button type="button" class="btn btn-success btn-sm"> View</button>
                                                    </a>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
