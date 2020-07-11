@extends('layouts/sidebar')
@section('content')
<style type="text/css">
.bootstrap-select>.dropdown-toggle{
	display: none !important;
}
.btn.dropdown-toggle.bs-placeholder .btn-simple{
	display: none !important;
}
.btn-group.bootstrap-select.form-control{
	border: none !important;
}
</style>
<form method="POST" class="row" action="{{ route('store-admin') }}">
	@csrf
	<div class="form-group col-md-6">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group col-md-6" name="email">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group col-md-6">
		<label>Role</label>
		<select class="form-control" name="role">
			@foreach($roles as $role)
			<option value="{{ $role->id }}">{{ $role->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="col-md-6">
		<label>Status</label>
		<select class="form-control" name="is_active">
			<option selected>Choose Status</option>
			<option value="1">Active</option>
			<option value="0">Inactive</option>
		</select>
	</div>
	<div class="form-group col-md-6 mt-3" name="email">
		<label>Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	<div class="col-md-12 text-center mt-3">
		<button class="btn btn-primary" name="create_user">Create User</button>
	</div>
</form>
@endsection