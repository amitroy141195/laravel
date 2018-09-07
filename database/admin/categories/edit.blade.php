@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')

	@foreach( $results as $row )
	<div class="panel-heading">
		Update Category: {{ $row->name }}
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('category.update',['id'=>$row->id]) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" value="{{ $row->name }}"class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Update Category
					</button>
				</div>
			</div>
		</form>
	</div>
	@endforeach

</div>

@stop