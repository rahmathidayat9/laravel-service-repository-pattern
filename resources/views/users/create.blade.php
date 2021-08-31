@extends('layouts.dashboard.app')
@section('title', 'Users Create')
@section('content_title', 'Users Create')
@section('content')
	<div class="col-lg-5">
		<a href="{{ route('user.index') }}" class="">BACK TO LIST</a>
		<div class="card">
			<div class="card-header">Create User</div>
			<div class="card-body">
				<form method="POST" action="{{ route('user.store') }}">
					@csrf
					<div class="form-group">
					<input type="" name="username" class="form-control" placeholder="username">
					@error('username')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="" name="fullname" class="form-control" placeholder="fullname">
					@error('fullname')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="email">
					@error('email')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="" name="password" class="form-control" placeholder="password">
					@error('password')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<select name="role" class="form-control">
						<option value="admin">ADMIN</option>
						<option value="member">MEMBER</option>
					</select>
					</div>
					<button type="submit" class="btn btn-primary btn-sm">SAVE</button>
				</form>
			</div>
		</div>
	</div>
@endsection