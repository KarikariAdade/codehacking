@extends('layouts.sidebar')
@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @if($users)
            @foreach($users as $user)
            <tr>
                <td><a href="{{ route('admin-users-edit', $user->id) }}">{{$user->name}}</a></td>
                <td><img class="img-fluid" height="50" width="50" src="{{$user->photo ? $user->photo->file : ''}}">{{ empty($user->photo) ? 'No photo yet': '' }}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1? 'Active': 'Inactive' }}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    @stop