@extends('layouts.blank')
@section('title', 'Login')
@section('content')

<div class="container d-flex align-items-center min-vh-100" style="max-width: 430px">

	<div class="w-100">
		@foreach ($errors->all() as $error)

			<div class="alert alert-danger mb-3">{{ $error }}</div>

		@endforeach
		<div class="card w-100 border-0 shadow">
			<div class="card-body">
				<h2 class="font-weight-bold mb-3">Login</h2>
				<form class="form mb-3" action="{{ route('auth.login') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<button class="mt-2 btn btn-primary w-100">Login</button>
				</form>
				<p class="text-center mb-0">Belum memiliki akun? <a href="/register">Daftar</a></p>
			</div>
		</div>
	</div>

</div>
@endsection