@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<table class="text-center">
			<thead>
				<th><b>Published Post</b></th>
			</thead>
		</table>
	</div>
	<div class="panel-body">
		@include('admin.includes.message')
		<table class="table table-hover">
			<thead>
				<th><b>Image</b></th>
				<th><b>Title</b></th>
				<th><b>Edit</b></th>
				<th><b>Trashed</b></th>
			</thead>
			<tbody>
				@if ( $result_post->count() > 0)
				@foreach( $result_post as $row )
				<tr>
					<td>
						<img src="{{ asset($row->featured) }}" alt="{{ $row->title }}" width="70px" height="50px">
					</td>
					<td>
						{{ $row->title }}
					</td>
					<td>
						<a class="btn btn-xs btn-info" href="{{ route('post.edit',['id'=>$row->id])}}">Edit</a>
					</td>
					<td>
						<a class="btn btn-xs btn-danger" href="{{ route('post.delete',['id'=>$row->id])}}">Trash</a>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td class="text-center">No Published Post</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop