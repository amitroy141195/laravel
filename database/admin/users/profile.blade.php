@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	@include('admin.includes.message')
	<div class="panel-heading">
		Edit your profile
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">User Name</label>
				<input type="text" name="name" value="{{ $user->name }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Email</label>
				<input type="email" name="email" value="{{ $user->email }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">New Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Upload New Avatar</label>
				<input type="file" name="avatar" class="form-control">
			</div>
			<div class="form-group">
				<label for="facebook">Facebook profile</label>
				<input type="text" name="facebook" value="{{ $user->profile->facebook}}" class="form-control">
			</div>

			<div class="form-group">
				<label for="youtube">Youtube profile</label>
				<input type="text" name="youtube" value="{{ $user->profile->youtube}}" class="form-control">
			</div>
			<div class="form-gropu">
				<label for="about">About you</label>
				<textarea class="form-control" name="about" id="about" cols="6" rows="6">{{ $user->profile->about}}</textarea>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Update profile
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop