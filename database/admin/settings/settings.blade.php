@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	@include('admin.includes.message')
	<div class="panel-heading">
		Setting
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('setting.update') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="site_name">Site Name</label>
				<input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" value="{{ $settings->address }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="address">Contact Email</label>
				<input type="email" name="contact_email" value="{{ $settings->contact_email }}"class="form-control">
			</div>
			<div class="form-group">
				<label for="contact_number">Contact Number</label>
				<input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Update Site Setting
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop