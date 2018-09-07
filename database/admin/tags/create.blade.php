@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	@include('admin.includes.message')
	<div class="panel-heading">
		Create a new Tag
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('tag.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="tag">Tag</label>
				<input type="text" name="tag" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Store Tag
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop