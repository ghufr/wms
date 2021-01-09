@extends('layouts.app')
@section('title', 'Categories')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container pb-5" style="padding-top: 128px">
	{{-- Fildzah --}}
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
				<td>{{ 1 }}</td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->description }}</td>
				<td>
					<a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-primary">Edit</a>
					<a href="{{ route('categories.delete', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection