@extends('layouts.app')
@section('title', 'Contact')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<a href="{{ route('contact.create') }}" class="btn btn-primary btn-sm mb-2">CREATE NEW DATA</a>
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Name</th>
		      <th scope="col">Number</th>
		      <th scope="col">Active</th>
		      <th scope="col">Handle</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($contacts as $row)
		    <tr>
		      <th scope="row">{{ $loop->iteration }}</th>
		      <td>{{ $row->name }}</td>
		      <td>{{ $row->number }}</td>
		      <td>{{ $row->active }}</td>
		      <td>
		      	<div class="row mx-auto">
		      	<a href="{{ route('contact.edit', $row->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
		      	<a href="{{ route('contact.show', $row->id) }}" class="btn btn-success btn-sm mr-2">Show</a>
		      	<form method="POST" action="{{ route('contact.destroy', $row->id) }}">
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
			{{ $contacts->links() }}
		</div>
	</div>
</div>
@endsection