@extends('layouts.blank')
@section('title', 'Profile')

{{-- @component('components.topbar')
@endcomponent --}}
@section('content')

<div>
	<nav class="navbar navbar-light shadow-sm d-flex justify-content-between bg-light position-fixed w-100">
		<a href="{{ route('dash') }}" class="btn btn-light">Back</a>
		<h5 class="mb-0 font-weight-bold">WMS</h5>
		<a href="#"></a>
	</nav>
	<div class="container" style="padding-top: 128px; max-width: 520px">
		<div class="card mb-5">
			<div class="card-body">
				<div class="mb-3 d-flex  align-items-center justify-content-between">
					<h5>Profile</h5>
					<button class="btn btn-sm btn-outline-secondary">Edit</button>

				</div>
				<p class="mb-0 font-weight-bold">John Doe</p>
				<p>john@acme.id</p>
				<p class="text-secondary">
					<small>
						Registered at 20 Aug 2020
					</small>
					</p>


			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-danger">Logout</button>
		</div>
	</div>

</div>
@endsection