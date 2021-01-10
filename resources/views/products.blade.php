@extends('layouts.app')
@section('title', 'Products')
@section('username', Auth::user()->name)
@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding: 86px 52px">
		{{-- Hisyam --}}
		@if (count($products) > 0)
				<div class="text-right mb-3">
						<a href="{{ route('products.input') }}" class="btn btn-primary">Add Product</a>
				</div>
				<table class="table table-bordered">
						<thead class="thead-light">
								<tr>
										<th>#</th>
										<th>Name</th>
										<th>Category</th>
										<th>Desc</th>
										<th>Volume</th>
										<th>Action</th>
								</tr>
						</thead>
						<tbody>
								@foreach ($products as $product)
										<tr>
												<td>{{ $product->id }}</td>
												<td>{{ $product->item_name }}</td>
												<td>{{ $product->category }}</td>
												<td>{{ $product->desc }}</td>
												<td>{{ $product->volume }}</td>
												<td>
														<a href="{{ route('products.edit', ['id' => $product->id]) }}"
																class="btn btn-primary">Edit</a>
														<a href="{{ route('products.delete', ['id' => $product->id]) }}"
																class="btn btn-danger">Delete</a>
												</td>
										</tr>
								@endforeach
						</tbody>
				</table>
		@else
				<div style="height: calc(100vh - 172px)"
						class="d-flex w-100 text-center justify-content-center align-items-center">
						<div>
								<h5>
										Belum ada Product
								</h5>
								<a href="{{ route('products.input') }}" class="btn btn-primary">Add Product</a>
						</div>
				</div>
		@endif
</div>
@endsection
