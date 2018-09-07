@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	@include('admin.includes.message')
	<div class="panel-heading">
		Create a new User
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('user.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">User</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Add User
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop