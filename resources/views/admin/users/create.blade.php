@extends('layouts/sidebar')
@section('content')
<form method="POST" class="row" action="{{ route('store-admin') }}">
	@csrf
	<div class="form-group col-md-6">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="col-md-12 text-center">
	<button class="btn btn-primary" name="create_user">Create User</button>
</div>
</form>
@endsection