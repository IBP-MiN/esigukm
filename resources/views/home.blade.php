@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Available Meeting List</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                      <br>

                      <div class="row">
                        @forelse($meetings as $meeting)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                     src="storage/images/{{$meeting->file_path}}" height="200px"
                                     data-holder-rendered="true">
                                <div class="card-body">
                                    <h5 class="card-title">Title: {{$meeting->title}}</h5>
                                    <p class="card-text">SIG: {{$meeting->sig}}</p> 
                                    <div class="d-flex justify-content-between align-items-center">
                                        
                                        <div class="btn-group">
                                            @hasrole('admin')
                                            <a href="{{route('admin.meeting.show', $meeting->id)}}" class="btn btn-sm btn-outline-success">View</a>
                                            @endhasrole
                                            @hasrole('lecturer')
                                            <a href="{{route('admin.meeting.show', $meeting->id)}}" class="btn btn-sm btn-outline-success">View</a>
                                            @endhasrole
                                            @hasrole('ajk')
                                            <a href="{{route('admin.meeting.show', $meeting->id)}}" class="btn btn-sm btn-outline-success">View</a>
                                            @endhasrole
                                            @hasrole('user')
                                            <a href="{{route('meeting.show', $meeting->id)}}" class="btn btn-sm btn-outline-success">View</a>
                                            @endhasrole
                                        </div>
                                        
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('d/m/Y')}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card">
                            <div class="card-header">
                              No Meeting Available
                            </div>
                            <div class="card-body">
                              <blockquote class="blockquote mb-0">
                                <p>There are no meeting current available. Please try again on the next time.</p>
                              </blockquote>
                            </div>
                          </div>
                        @endforelse
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
