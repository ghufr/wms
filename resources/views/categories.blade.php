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
				<th>
					<button class="btn btn-sm btn-outline-success">Edit</button>
				</th>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection