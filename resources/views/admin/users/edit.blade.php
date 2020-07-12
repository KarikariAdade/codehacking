@extends('layouts/sidebar')
@section('content')
<style type="text/css">
	.bootstrap-select>.dropdown-toggle {
		display: none !important;
	}

	.btn.dropdown-toggle.bs-placeholder .btn-simple {
		display: none !important;
	}

	.btn-group.bootstrap-select.form-control {
		border: none !important;
	}
</style>
<div class="row">
	@if(!empty($user->photo->file))
	<div class="col-md-4">
		<img class="img-fluid" src="../../{{$user->photo->file}}">
	</div>
	@endif
	<div class="col-md-8">
		<form class="row" method="POST" action="{{ route('admin-users-update', $user->id) }}"
			enctype="multipart/form-data">
			@include('/includes/form-error')
			@method('PATCH')
			@csrf
			<div class="form-group col-md-6">
				<input type="hidden" name="id" value="{{ $user->id }}">
				<label>Name</label>
				<input type="text" name="name" class="form-control"
					value="{{ isset($user->name) ?$user->name: old('name') }}">
			</div>
			<div class="form-group col-md-6" name="email">
				<label>Email</label>
				<input type="text" name="email" class="form-control"
					value="{{ isset($user->email) ?$user->email: old('email')}}">
			</div>
			<div class="form-group col-md-6">
				<label>Role</label>
				<select class="form-control" name="role_id">
					@foreach($roles as $role)
					<option {{($role->id == $user->role_id) ? 'selected' : ''}} value="{{ $role->id }}">{{ $role->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-6">
				<label>Status</label>
				<select class="form-control" name="is_active">
					<option value="1">Active</option>
					<option value="0">Inactive</option>
				</select>
			</div>
			<div class="form-group col-md-6 mt-3">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group col-md-6 mt-3">
				<label>Profile Image</label>
				<input type="file" name="photo_id" class="form-control">
			</div>
			<div class="col-md-12 text-center mt-3">
				<button class="btn btn-primary" name="create_user">Update User</button>
			</div>
		</form>
	</div>
</div>
@endsection