@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Meeting</div>

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
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date Start</th>
                            <th scope="col">Date End</th>
                            <th scope="col">SIG</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Live</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                      {{$users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
