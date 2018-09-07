@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	 @include('admin.includes.errors')
	 @include('admin.includes.message')


	<div class="panel-heading">
		Edit Post :{{ $post->title }}
	</div>
	<hr>
	<div class="panel-body">
		<form action="{{ route('post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" value="{{ $post->title }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="featured">Featured Image</label>
				<input type="file" name="featured" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">Select a category</label>
                <select name="category_id" id="category" class="form-control">
                	@foreach( $category as $row )
                	 <option value="{{ $row->id}}" <?php if($row->id == $post->category_id) echo 'selected'; ?> >{{$row->name}}</option>
                	@endforeach
                </select>
			</div>
			<div class="form-group">
				<label for="tags">Select a Tag</label>
				@foreach( $result_tag as $row_tag )
				<div class="checkbox">
					<label><input type="checkbox" name="tag[]" value="{{$row_tag->id }}"
                    @foreach( $post->tags as $row_post)
                    	@if( $row_tag->id == $row_post->id )
                    	   checked
                    	@endif
                    @endforeach
					>{{ $row_tag->tag }}</label>
				</div>
				@endforeach
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" rows="5" cols="5" class="form-control">{{ $post->content }}</textarea>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Update post
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


@section('scripts_header')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
@stop

@section('scripts_body')
	
	<script>
		   $(document).ready(function() {
		        $('#content').summernote();
		    });
	</script>
@stop