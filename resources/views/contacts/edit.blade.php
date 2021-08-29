@extends('layouts.app')
@section('title', 'Edit Contact')
@section('content')
	<div class="col-lg-5">
		<a href="{{ route('contact.index') }}" class="">BACK TO LIST</a>
		<div class="card">
			<div class="card-header">Edit Contact</div>
			<div class="card-body">
				<form method="POST" action="{{ route('contact.update', $contact->id) }}">
					@csrf
					@method('PATCH')
					<div class="form-group">
					<input type="" name="name" value="{{ $contact->name }}" class="form-control" placeholder="name">
					@error('name')
						{{ $message }}
					@enderror
					</div>
					<div class="form-group">
					<input type="" name="number" value="{{ $contact->number }}" class="form-control" placeholder="number">
					@error('number')
						{{ $message }}
					@enderror
					</div>
					<div class="form-group">
					<input type="" name="active" value="{{ $contact->active }}" class="form-control" placeholder="active">
					@error('active')
						{{ $message }}
					@enderror
					</div>
					<button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
				</form>
			</div>
		</div>
	</div>
@endsection