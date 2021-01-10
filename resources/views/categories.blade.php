@extends('layouts.app')
@section('title', 'Categories')
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent
@section('content')
<div class="container pb-5" style="padding: 86px 52px">
	{{-- Fildzah --}}

	@if(count($categories) > 0)
	<div class="text-right mb-3">
		<a href="{{ route('categories.input') }}" class="btn btn-primary">Add Category</a>
	</div>
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->description }}</td>
				<td>
					<a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
					<a href="{{ route('categories.delete', ['id' => $category->id]) }}" class="btn btn-sm btn-outline-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<div style="height: calc(100vh - 172px)" class="d-flex w-100 text-center justify-content-center align-items-center">
		<div>
			<h5>
				Belum ada Category
			</h5>
			<a href="{{ route('categories.input') }}" class="btn btn-primary">Add Category</a>
		</div>
	</div>
	@endif
</div>
@endsection