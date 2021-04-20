@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage {{$user->name}} Role</div>

                <div class="card-body">
                    <form action="{{route('admin.users.update', ['user'=> $user->id]) }}" method="POST">
                        @csrf
                        {{method_field('PUT') }}
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <label for="name" class="col-md-5 col-form-label text-md-right">Roles</label>
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                {{$user->hasAnyRole($role->name)?'checked':'' }}>
                                <label>{{$role->name}}</label>
                            </div>
                        @endforeach
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Role') }}
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
