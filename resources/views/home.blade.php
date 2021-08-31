@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="row">
	@foreach($blogs as $blog)
	<div class="card mb-3 ml-3" style="max-width: 540px;">
	  <div class="row no-gutters">
	    <div class="col-md-4">
	      <img src="{{ asset('storage/uploads/images/blogs/'.$blog->thumbnail) }}" width="150" style="height: 200px; object-fit: cover; object-position: center;" alt="">
	    </div>
	    <div class="col-md-8">
	      <div class="card-body">
	        <h5 class="card-title">{{ $blog->title }}</h5>
	        <p class="card-text">{!! Str::limit($blog->body, 100) !!}.</p>
	        <p class="card-text">
	        	<a href="{{ route('home.blog.show', $blog->slug) }}">Read More</a>
	        </p>
	      </div>
	    </div>
	  </div>
	</div>
	@endforeach

	<div class="mt-3">
		{{ $blogs->links() }}
	</div>
</div>
@endsection