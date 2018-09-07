@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<table class="text-center">
			<thead>
				<th><b>Trashed Post</b></th>
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
				<th><b>Restore</b></th>
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
						<a class="btn btn-xs btn-success" href="{{ route('post.restore',['id'=>$row->id])}}">Restore</a>
					</td>
					<td>
						<a class="btn btn-xs btn-danger" href="{{ route('post.kill',['id'=>$row->id])}}">Destroy</a>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td class="text-center">No Trashed Post</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop