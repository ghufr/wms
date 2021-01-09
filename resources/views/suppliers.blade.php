@extends('layouts.app')
@section('title', 'Suppliers')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Cantika --}}
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>City</th>
				<th>Contact</th>
				<th>Product</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($suppliers as $supplier)
			<tr>
				<td>{{ 1 }}</td>
				<td>{{ $supplier->name }}</td>
				<td>{{ $supplier->phone }}</td>
				<td>{{ $supplier->address }}</td>
				<td>
					<span class="badge badge-secondary">Kain</span>
					<span class="badge badge-secondary">Jarum</span>
				</td>
				<td>
				<a href="{{ route('suppliers.edit', ['id' => $supplier->id]) }}" class="btn btn-primary">Edit</a>
				<a href="{{ route('suppliers.delete', ['id' => $supplier->id]) }}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection