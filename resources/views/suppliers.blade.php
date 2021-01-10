@extends('layouts.app')
@section('title', 'Suppliers')
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding: 86px 52px">
	{{-- Cantika --}}

	@if(count($suppliers) > 0)
	<div class="text-right mb-3">
		<a href="{{ route('suppliers.input') }}" class="btn btn-primary">Add Supplier</a>
	</div>
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>City</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($suppliers as $supplier)
			<tr>
				<td>{{ $supplier->id }}</td>
				<td>{{ $supplier->name }}</td>
				<td>
					<a class="badge-pill badge-primary" href="">
						{{ $supplier->address_city }}
					</a>
				</td>
				<td>{{ $supplier->phone }}</td>
				<td>
					<a href="{{ route('suppliers.edit', ['id' => $supplier->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
					<a href="{{ route('suppliers.delete', ['id' => $supplier->id]) }}" class="btn btn-sm btn-outline-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<div style="height: calc(100vh - 172px)" class="d-flex w-100 text-center justify-content-center align-items-center">
		<div>
			<h5>
				Belum ada Supplier
			</h5>
			<a href="{{ route('suppliers.input') }}" class="btn btn-primary">Add Supplier</a>
		</div>
	</div>
	@endif
</div>
@endsection