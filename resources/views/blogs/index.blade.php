@extends('layouts.dashboard.app')
@section('title', 'Blogs')
@section('content_title', 'Blogs')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm mb-2">CREATE NEW DATA</a>
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Title</th>
		      <th scope="col">Handle</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($blogs as $row)
		    <tr>
		      <th scope="row">{{ $loop->iteration }}</th>
		      <td>{{ $row->title }}</td>
		      <td>
		      	<div class="row mx-auto">
		      	<a href="{{ route('blog.edit', $row->id) }}" class="btn btn-primary btn-sm mr-2">EDIT</a>
		      	<a href="{{ route('blog.show', $row->id) }}" class="btn btn-success btn-sm mr-2">SHOW</a>
		      	<form method="POST" action="{{ route('blog.destroy', $row->id) }}">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger btn-sm mr-2" onclick="return confirm('Yakin Hapus?')">DELETE</button>
				</form>
				</div>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<div class="mt-4 pagination justify-content-center">
			{{ $blogs->links() }}
		</div>
	</div>
</div>
@endsection