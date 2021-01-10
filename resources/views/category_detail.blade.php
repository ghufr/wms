@extends('layouts.app')
@if(Route::is('categories.input'))
@section('title', 'Add New Category')
@else
@section('title', 'Edit Category')
@endif
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent

@section('content')
<div class="container-fluid" style="padding: 86px 52px">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					{{-- Fildzah --}}
					<form action="{{ Route::is('categories.input') ? route('categories.create') : route('categories.update', ['id' => $category->id]) }}" method="post">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input class="form-control" type="text" id="name" name="name" value="{{ Route::is('categories.edit') ? $category->name : '' }}" required>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea class="form-control" id="description" name="description">{{ Route::is('categories.edit') ? $category->description : '' }}</textarea>
						</div>
						<div class="text-right">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection