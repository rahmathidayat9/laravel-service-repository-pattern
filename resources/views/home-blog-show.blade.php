@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="row">
	<div class="col-lg-8">
		<div class="card mb-5">
			<div class="card-header">
				<b>{{ $blog->title }}</b>

				<a href="{{ route('home.index') }}" class="float-right">Back To Home</a>
			</div>
			<div class="card-body">
				<img class="card-img" src="{{ asset('storage/uploads/images/blogs/'.$blog->thumbnail) }}" width="450" style="height: 400px; object-fit: cover; object-position: center;">
				<hr>
				<div class="card-text mb-3 mt-3">
					{!! $blog->body !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection