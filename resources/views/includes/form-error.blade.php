@if(count($errors) > 0)
	<div class="p-3 col-md-12">
	<div class="alert alert-danger ">
		<ul>
			@foreach($errors->all() as $error)
			<li>
				{{ $error }}
			</li>
			@endforeach
		</ul>
	</div>
</div>
	@endif