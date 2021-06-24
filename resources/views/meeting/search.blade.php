@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($details))
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Meetings</div>
                    <a class="btn btn-secondary" href="{{ route('meeting.index') }}">
                        {{ __('Back') }}
                    </a>

                    <div class="card-body">
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
                                @foreach($details as $meeting)
                            <tr>
                                <th>{{$meeting->title}}</th>
                                <th>{{$meeting->description}}</th>
                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('d/m/Y')}}</th>
                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_start_time)->format('g:ia')}}</th>
                                <th>{{ \Carbon\Carbon::parse($meeting->meeting_end_time)->format('g:ia')}}</th>
                                <th>{{$meeting->location}}</th>
                                <th>{{$meeting->sig}}</th>
                                <th>
                                    <a href="{{route('meeting.details', $meeting->id)}}" class="float-left">
                                        <button type="button" class="btn btn-success btn-sm"> View</button>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
