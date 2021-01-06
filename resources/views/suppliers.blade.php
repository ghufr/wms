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
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection