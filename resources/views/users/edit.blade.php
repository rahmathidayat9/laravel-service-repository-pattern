@extends('layouts.dashboard.app')
@section('title', 'Users Edit')
@section('content_title', 'Users Edit')
@section('content')
	<div class="col-lg-5">
		<a href="{{ route('user.index') }}" class="">BACK TO LIST</a>
		<div class="card">
			<div class="card-header">Create User</div>
			<div class="card-body">
				<form method="POST" action="{{ route('user.update', $user->id) }}">
					@csrf
					@method('PATCH')
					<div class="form-group">
					<input type="" name="username" value="{{ $user->username }}" class="form-control" placeholder="username">
					@error('username')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="" name="fullname" value="{{ $user->fullname }}" class="form-control" placeholder="fullname">
					@error('fullname')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="email">
					@error('email')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					</div>
					<div class="form-group">
					<input type="password" name="password" required="" class="form-control" placeholder="password">
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
					<button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
				</form>
			</div>
		</div>
	</div>
@endsection