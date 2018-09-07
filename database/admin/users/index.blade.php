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
				<th><b>Name</b></th>
				<th><b>Permission</b></th>
				<th><b>Delete</b></th>
			</thead>
			<tbody>
				@if ( $users->count() > 0)
				@foreach( $users as $row )
				<tr>
					<td>
						<img src="{{ asset($row->profile->avatar) }}" alt="{{ $row->name }}" width="70px" height="50px" style="border-radius: 50%">
					</td>
					<td>
						{{ $row->name }}
					</td>
					<td>
						@if($row->admin)
						<a class="btn btn-xs btn-danger" href="{{ route('user.not.admin',['id'=>$row->id])}}">Remove permission</a>
						@else
						<a class="btn btn-xs btn-success" href="{{ route('user.admin',['id'=>$row->id])}}">Make Admin</a>
						@endif
					</td>
					<td>
						@if (Auth::id() != $row->id)
						<a class="btn btn-xs btn-danger" href="{{ route('user.delete',['id'=>$row->id])}}">Delete</a>
						@endif
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