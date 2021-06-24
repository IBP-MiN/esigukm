@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @hasrole('admin')
                    <div class="card-header">Manage Meeting</div>
                    <a class="btn btn-primary" href="{{ route('admin.meeting.create') }}">
                        {{ __('Create New Meeting') }}
                    </a>
                    @endhasrole

                    @hasrole('lecturer')
                    <div class="card-header">View Meetings</div>
                    <a class="btn btn-primary" href="{{ route('admin.meeting.create') }}">
                        {{ __('Create New Meeting') }}
                    </a>
                    @endhasrole

                    @hasrole('ajk')
                    <div class="card-header">View Meetings</div>
                    @endhasrole

                    <div class="card-body">
                        <form action="{{ route('admin.meeting.search') }}" method="POST" role="search">
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
                        <br>

                        @hasrole('admin')
                        <table class="table">
                            <br>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time Start</th>
                                    <th scope="col">Time End</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">SIG</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $index => $meeting)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <th>{{ $meeting->title }}</th>
                                        <th>{{ $meeting->description }}</th>
                                        <th>{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('d/m/Y') }}</th>
                                        <th>{{ \Carbon\Carbon::parse($meeting->meeting_start_time)->format('g:i a') }}
                                        </th>
                                        <th>{{ \Carbon\Carbon::parse($meeting->meeting_end_time)->format('g:i a') }}</th>
                                        <th>{{ $meeting->location }}</th>
                                        <th>{{ $meeting->sig }}</th>
                                        <th>
                                            <a href="{{ route('admin.meeting.details', $meeting->id) }}" class="float-left">
                                                <button type="button" class="btn btn-success btn-sm"> View</button>
                                            </a>
                                            <a href="{{ route('admin.meeting.edit', $meeting->id) }}" class="float-left">
                                                <button type="button" class="btn btn-warning btn-sm"> Edit</button>
                                            </a>
                                            <form action="{{ route('admin.meeting.destroy', $meeting->id) }}"
                                                method="POST" class="float-left">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endhasrole

                        @hasrole('lecturer')
                        <table class="table">
                            <br>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time Start</th>
                                    <th scope="col">Time End</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">SIG</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    @if ($meeting->id != '0' && Auth::user()->sig == $meeting->sig)
                                        <tr>
                                            <th>{{ $meeting->title }}</th>
                                            <th>{{ $meeting->description }}</th>
                                            <th>{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('d/m/Y') }}</th>
                                            <th>{{ \Carbon\Carbon::parse($meeting->meeting_start_time)->format('g:i a') }}
                                            </th>
                                            <th>{{ \Carbon\Carbon::parse($meeting->meeting_end_time)->format('g:i a') }}
                                            </th>
                                            <th>{{ $meeting->location }}</th>
                                            <th>{{ $meeting->sig }}</th>
                                            <th>
                                                <a href="{{ route('admin.meeting.details', $meeting->id) }}"
                                                    class="float-left">
                                                    <button type="button" class="btn btn-success btn-sm"> View</button>
                                                </a>
                                                <a href="{{ route('admin.meeting.edit', $meeting->id) }}"
                                                    class="float-left">
                                                    <button type="button" class="btn btn-warning btn-sm"> Edit</button>
                                                </a>
                                                <form action="{{ route('admin.meeting.destroy', $meeting->id) }}"
                                                    method="POST" class="float-left">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </th>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @endhasrole

                        @hasrole('ajk')
                        <table class="table">
                            <br>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time Start</th>
                                    <th scope="col">Time End</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">SIG</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    @foreach ($attends as $attend)
                                        @if (Auth::user()->sig == $meeting->sig && $meeting->id == $attend->meeting_id && Auth::user()->id == $attend->user_id)
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
                                                    <a href="{{ route('admin.meeting.details', $meeting->id) }}"
                                                        class="float-left">
                                                        <button type="button" class="btn btn-success btn-sm"> View</button>
                                                    </a>
                                                    <a href="{{ route('admin.meeting.edit', $meeting->id) }}"
                                                        class="float-left">
                                                        <button type="button" class="btn btn-warning btn-sm"> Edit</button>
                                                    </a>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        @endhasrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
