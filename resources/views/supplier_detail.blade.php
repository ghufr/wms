@extends('layouts.app')
@section('title', 'Supplier Details')

@section('content')
<div class="container" style="padding-top: 128px">
	<div class="card">
		<div class="card-body">
			{{-- Cantika --}}
			<form action="{{ route('suppliers.create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control" type="text" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input class="form-control" type="text" id="phone" name="phone">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input class="form-control" type="text" id="address" name="address">
				</div>
				<button type="submit">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection