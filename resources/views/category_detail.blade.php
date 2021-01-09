@extends('layouts.app')
@section('title', 'Category Details')

@section('content')
<div class="container" style="padding-top: 128px">
	<div class="card">
		<div class="card-body">
			{{-- Fildzah --}}
			<form action="{{ route('categories.create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control" type="text" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" name="description">
			</textarea>
				</div>
				<button type="submit">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection