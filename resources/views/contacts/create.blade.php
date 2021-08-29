@extends('layouts.app')
@section('title', 'Create Contact')
@section('content')
	<div class="col-lg-5">
		<a href="{{ route('contact.index') }}" class="">BACK TO LIST</a>
		<div class="card">
			<div class="card-header">Create Contact</div>
			<div class="card-body">
				<form method="POST" action="{{ route('contact.store') }}">
					@csrf
					<div class="form-group">
					<input type="" name="name" class="form-control" placeholder="name">
					@error('name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="" name="number" class="form-control" placeholder="number">
					@error('number')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="" name="active" class="form-control" placeholder="active">
					@error('active')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<button type="submit" class="btn btn-primary btn-sm">SAVE</button>
				</form>
			</div>
		</div>
	</div>
@endsection