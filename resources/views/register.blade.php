@extends('layouts.blank')
@section('title', 'Login')
@section('content')

<div class="container d-flex align-items-center vh-100" style="max-width: 430px">
	<!-- <div class="w-100"> -->
	<!-- <div class="text-center font-weight-bolder">W.M.S</div> -->
	<div class="w-100">

		@foreach ($errors->all() as $error)

			<div class="alert alert-danger mb-3">{{ $error }}</div>

		@endforeach
		<div class="card w-100 border-0 shadow">
			<div class="card-body">
				<h2 class="font-weight-bold mb-3">Register</h2>
				<form class="form mb-3" action="{{ route('auth.register') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="name">Fullname</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<button class="mt-2 btn btn-primary w-100">Register</button>
				</form>
				<p class="text-center mb-0">Sudah punya akun? <a href="/login">Login</a></p>
			</div>
		</div>
	</div>

</div>
@endsection