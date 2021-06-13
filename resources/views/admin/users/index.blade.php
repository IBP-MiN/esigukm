@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @hasrole('admin')
                <div class="card-header">Manage Users</div>
                @endhasrole

                @hasrole('lecturer')
                <div class="card-header">View Users</div>
                @endhasrole

                @hasrole('ajk')
                <div class="card-header">View Users</div>
                @endhasrole
                

                <div class="card-body">
                    <form action="{{ route('admin.search') }}" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="search" class="form-control" name="query" required
                                placeholder="Search users by  Name or Matric Number"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-info">
                                    Search
                                </button>
                            </span>
                        </div>
                    </form>
                    <br>
                    @hasrole('admin')
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Matric Number</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">SIG</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                            <tr>
                                <th>{{$index +1}}</th>
                                <th>{{$user->name}}</th>
                                <th>{{$user->matric_no}}</th>
                                <th>{{$user->phone_no}}</th>
                                <th>{{$user->sig}}</th>
                                <th>{{$user->email}}</th>
                                <th>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                <th>
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="float-left">
                                        <button type="button" class="btn btn-primary btn-sm"> Edit</button>
                                    </a>
                                    <a href="{{route('admin.impersonate', $user->id)}}" class="float-left">
                                        <button type="button" class="btn btn-success btn-sm"> Impersonate User</button>
                                    </a>
                                    <form action="{{route('admin.users.destroy', $user->id) }}" method="POST" class="float-middle">
                                        @csrf
                                        {{method_field('DELETE') }}
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
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Matric Number</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">SIG</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                            @if($user->id != '1' && Auth::user()->sig == $user->sig)
                            <tr>
                                <th>{{$index +0}}</th>
                                <th>{{$user->name}}</th>
                                <th>{{$user->matric_no}}</th>
                                <th>{{$user->phone_no}}</th>
                                <th>{{$user->sig}}</th>
                                <th>{{$user->email}}</th>
                                <th>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                <th>
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="float-left">
                                        <button type="button" class="btn btn-primary btn-sm"> Edit</button>
                                    </a>
                                    <form action="{{route('admin.users.destroy', $user->id) }}" method="POST" class="float-middle">
                                        @csrf
                                        {{method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </th>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                      </table>
                      @endhasrole
                      {{$users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
