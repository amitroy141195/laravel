@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<table class="text-center">
			<thead>
				<th><b>Tags List</b></th>
			</thead>
		</table>
	</div>
	<div class="panel-body">
		@include('admin.includes.message')
		<table class="table table-hover">
			<thead>
				<th><b>Tag Name</b></th>
				<th><b>Editing</b></th>
				<th><b>Deleting</b></th>
			</thead>
			<tbody>
				@if( $result_tag->count() > 0)
				@foreach( $result_tag as $row )
				<tr>
					<td>
						{{ $row->tag }}
					</td>
					<td>
						<a href="{{route('tag.edit',['id'=>$row->id])}}" class="btn btn-xs btn-info">Edit</a>

					</td>
					<td>
						<a href="{{route('tag.delete',['id'=>$row->id])}}" class="btn btn-xs btn-danger">Delete</a>

					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td class="text-center">No Tag yet</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop