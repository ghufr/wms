@extends('layouts.app')
@section('title', 'Products')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Hisyam --}}
	@if($products)
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
				<td>{{ $product->sku }}</td>
				<td>{{$product->item_name}}</td>
				<td>{{$product->category}}</td>
				<td>{{$product->desc}}</td>
				<td>{{$product->volume}}</td>
				<td>
					<a href="{{ route('products.edit' , ['id' => $product->id] ) }}" class="btn btn-primary">Edit</a>
					<a href="{{ route('products.delete' , ['id' => $product->id] ) }}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	kosong
	@endif
</div>
@endsection