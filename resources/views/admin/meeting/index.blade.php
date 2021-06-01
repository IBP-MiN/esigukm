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
                        <form action="{{ route('admin.search') }}" method="GET" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="search" class="form-control" name="query" required
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
                                @foreach($meetings as $index => $meeting)
                            <tr>
                                <th>{{$index +1}}</th>
                                <th>{{$meeting->title}}</th>
                                <th>{{$meeting->description}}</th>
                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('d/m/Y')}}</th>
                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_start_time)->format('h:i')}}</th>
                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_end_time)->format('h:i')}}</th>
                                <th>{{$meeting->location}}</th>
                                <th>{{$meeting->sig}}</th>
                                @hasrole('admin')
                                <th>
                                    <a href="{{route('admin.meeting.show', $meeting->id)}}" class="float-left">
                                        <button type="button" class="btn btn-success btn-sm"> View</button>
                                    </a>
                                    <a href="{{route('admin.meeting.edit', $meeting->id)}}" class="float-middle">
                                        <button type="button" class="btn btn-warning btn-sm"> Edit</button>
                                    </a>
                                    <form action="{{route('admin.meeting.destroy', $meeting->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </th>
                                @endhasrole

                                @hasrole('lecturer')
                                <th>
                                    <a href="{{route('admin.meeting.show', $meeting->id)}}" class="float-left">
                                        <button type="button" class="btn btn-success btn-sm"> View</button>
                                    </a>
                                    <a href="{{route('admin.meeting.edit', $meeting->id)}}" class="float-left">
                                        <button type="button" class="btn btn-warning btn-sm"> Edit</button>
                                    </a>
                                    <form action="{{route('admin.meeting.destroy', $meeting->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </th>
                                @endhasrole

                                @hasrole('ajk')
                                <th>
                                    <a href="{{route('admin.meeting.show', $meeting->id)}}" class="float-left">
                                        <button type="button" class="btn btn-success btn-sm"> View</button>
                                    </a>
                                    <a href="{{route('admin.meeting.update', $meeting->id)}}" class="float-left">
                                        <button type="button" class="btn btn-warning btn-sm"> Update</button>
                                    </a>
                                </th>
                                @endhasrole
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
