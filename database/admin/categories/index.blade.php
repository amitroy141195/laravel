@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<table class="text-center">
			<thead>
				<th><b>Category List</b></th>
			</thead>
		</table>
	</div>
	<div class="panel-body">
		@include('admin.includes.message')
		<table class="table table-hover">
			<thead>
				<th><b>Category Name</b></th>
				<th><b>Editing</b></th>
				<th><b>Deleting</b></th>
			</thead>
			<tbody>
				@if($results->count() > 0)
				@foreach( $results as $row )
				<tr>
					<td>
						{{ $row->name }}
					</td>
					<td>
						<a href="{{route('category.edit',['id'=>$row->id])}}" class="btn btn-xs btn-info">Edit</a>

					</td>
					<td>
						<a href="{{route('category.delete',['id'=>$row->id])}}" class="btn btn-xs btn-danger">Delete</a>

					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td class="text-center">No Category yet</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop