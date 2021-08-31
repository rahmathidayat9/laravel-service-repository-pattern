@extends('layouts.dashboard.app')
@section('title', 'Users')
@section('content_title', 'Users')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-2">CREATE NEW DATA</a>
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Username</th>
		      <th scope="col">Fullname</th>
		      <th scope="col">Email</th>
		      <th scope="col">Role</th>
		      <th scope="col">Handle</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $row)
		    <tr>
		      <th scope="row">{{ $loop->iteration }}</th>
		      <td>{{ $row->username }}</td>
		      <td>{{ $row->fullname }}</td>
		      <td>{{ $row->email }}</td>
		      <td>{{ $row->role }}</td>
		      <td>
		      	<div class="row mx-auto">
		      	<a href="{{ route('user.edit', $row->id) }}" class="btn btn-primary btn-sm mr-2">EDIT</a>
		      	<a href="{{ route('user.show', $row->id) }}" class="btn btn-success btn-sm mr-2">SHOW</a>
		      	<form method="POST" action="{{ route('user.destroy', $row->id) }}">
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
			{{ $users->links() }}
		</div>
	</div>
</div>
@endsection