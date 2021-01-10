@extends('layouts.blank')
@section('title', 'Profile')

{{-- @component('components.topbar')
@endcomponent --}}
@section('content')

<div>
	{{-- Hisyam --}}
	<nav class="navbar navbar-light shadow-sm d-flex justify-content-between bg-light position-fixed w-100">
		<a href="{{ url()->previous() }}" class="btn btn-light">Back</a>
		<h5 class="mb-0 font-weight-bold">WMS</h5>
		<a class="btn btn-light invisible" href="#">Back</a>
	</nav>
	<div class="container" style="padding-top: 128px; max-width: 520px">
		<div class="card mb-5">
			<div class="card-body">
				<div class="mb-3 d-flex  align-items-center justify-content-between">
					<h5>Profile</h5>
					{{-- <button class="btn btn-sm btn-outline-secondary">Edit</button> --}}

				</div>
				<p class="mb-0 font-weight-bold">{{ $user->name }} <span class="badge badge-secondary">{{ ucfirst($user->role) }}</span></p>
				<p>{{ $user->email }}</p>

				<p class="text-secondary">
					<small>
						Registered at {{ $user->created_at }}
					</small>
					</p>


			</div>
		</div>
		<div class="text-center">
			<a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>
		</div>
	</div>

</div>
@endsection