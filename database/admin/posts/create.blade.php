@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	 @include('admin.includes.errors')
	 @include('admin.includes.message')

	<div class="panel-heading">
		Create a new post
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="featured">Featured Image</label>
				<input type="file" name="featured" class="form-control">
			</div>
			<div class="form-group">
				<label for="tags">Select a Tag</label>
				@foreach( $result_tag as $row_tag )
				<div class="checkbox">
					<label><input type="checkbox" name="tag[]" value="{{$row_tag->id }}">{{ $row_tag->tag }}</label>
				</div>
				@endforeach
			</div>
			<div class="form-group">
				<label for="category">Select a category</label>
                <select name="category_id" id="category" class="form-control">
                	@foreach( $result_category as $row )
                	 <option value="{{ $row->id}}">{{$row->name}}</option>
                	@endforeach
                </select>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" rows="5" cols="5" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Store post
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop

@section('styles')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop


@section('style_header')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
@stop

@section('scripts')
	
	<script>
		   $(document).ready(function() {
		        $('#content').summernote();
		    });
	</script>
@stop