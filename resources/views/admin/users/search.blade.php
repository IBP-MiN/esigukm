@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Users</div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Matric Number</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">SIG</th>
                            <th scope="col">Email</th>
                            @hasrole('admin')
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                            @endhasrole
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th>{{$user->name}}</th>
                                <th>{{$user->matric_no}}</th>
                                <th>{{$user->phone_no}}</th>
                                <th>{{$user->sig}}</th>
                                <th>{{$user->email}}</th>
                                @hasrole('admin')
                                <th>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                <th>
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="float-left">
                                        <button type="button" class="btn btn-primary btn-sm"> Edit</button>
                                    </a>
                                    <a href="{{route('admin.impersonate', $user->id)}}" class="float-left">
                                        <button type="button" class="btn btn-success btn-sm"> Impersonate User</button>
                                    </a>
                                    <form action="{{route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </th>
                                @endhasrole
                            </tr>
                            @endforeach
                            <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">
                                {{ __('Back') }}
                            </a>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
