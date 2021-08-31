@extends('layouts.dashboard.app')
@section('title', 'Users Show')
@section('content_title', 'Users Show')
@section('content')
	<div class="col-lg-5">
		<a href="{{ route('user.index') }}" class="">BACK TO LIST</a>
		<div class="card">
			<div class="card-header">Show User</div>
			<div class="card-body">
					<div class="form-group">
					<input type="" name="username" readonly="" value="{{ $user->username }}" class="form-control" placeholder="username">
					
					</div>
					<div class="form-group">
					<input type="" name="fullname" readonly="" value="{{ $user->fullname }}" class="form-control" placeholder="fullname">
					
					</div>
					<div class="form-group">
					<input type="email" name="email" readonly="" value="{{ $user->email }}" class="form-control" placeholder="email">
					
					</div>
			</div>
		</div>
	</div>
@endsection