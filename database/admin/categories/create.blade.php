@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')
	@include('admin.includes.message')
	<div class="panel-heading">
		Create a new Category
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('category.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Store Category
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop