@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	@include('admin.includes.errors')

	@foreach( $result_tag as $row )
	<div class="panel-heading">
		Update Tags: {{ $row->tag }}
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('tag.update',['id'=>$row->id]) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="tag">Tag</label>
				<input type="text" name="tag" value="{{ $row->tag }}"class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Update Tag
					</button>
				</div>
			</div>
		</form>
	</div>
	@endforeach

</div>

@stop