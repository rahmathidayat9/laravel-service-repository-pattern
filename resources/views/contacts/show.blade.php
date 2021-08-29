@extends('layouts.app')
@section('title', 'Show Contact')
@section('content')
	<div class="col-lg-5">
		<a href="{{ route('contact.index') }}" class="">BACK TO LIST</a>
		<div class="card">
			<div class="card-header">Show Contact</div>
			<div class="card-body">
					<div class="form-group">
					<input type="" readonly="" name="name" value="{{ $contact->name }}" class="form-control" placeholder="name">
					</div>
					<div class="form-group">
					<input type="" readonly="" name="number" value="{{ $contact->number }}" class="form-control" placeholder="number">
					</div>
					<div class="form-group">
					<input type="" readonly="" name="active" value="{{ $contact->active }}" class="form-control" placeholder="active">
					</div>
			</div>
		</div>
	</div>
@endsection