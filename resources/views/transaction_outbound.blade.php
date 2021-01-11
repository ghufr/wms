@extends('layouts.app')

@section('title', ucfirst(Request()->type).' Transaction')
@section('username', Auth::user()->name)
@component('components.topbar')
@endcomponent
@section('content')

<div class="container" style="padding: 86px 52px">
	@foreach ($errors->all() as $error)

	<div class="alert alert-danger mb-3">{{ $error }}</div>

	@endforeach
	<div class="row">
		<div class="col">
			{{-- Ghufron --}}




			<h3 class="font-weight-bold mb-3">Stock</h3>
			<select style="max-width: 400px;" class="form-control mb-3" name="warehouse" id="warehouse" value="{{ '?choosen='. Request()->choosen }}" onchange="location = '{{ route('transactions.outbound') }}?choosen=' + this.value;">
				<option value="0">Choose Warehouse...</option>
				@foreach ($warehouses as $warehouse)
						<option value="{{ $warehouse->id }}" {{ $warehouse->id == Request()->choosen ? 'selected' : '' }}>{{ $warehouse->name }}</option>
				@endforeach
			</select>
			@if(count($stocks))
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
						<th>
							Product
						</th>
						<th>
							Warehouse
						</th>
						<th>
							Price
						</th>

						<th>
							Quantity
						</th>
						<th>
							Outbound Quantity
						</th>
						<th>
							Action
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($stocks as $stock)
					<form action="{{ route('transactions.sub') }}" method="POST">
						@csrf
						<input type="hidden" name="id" value="{{$stock->id}}">
						{{-- <input type="hidden" name="qty" value="{{$stock->qty}}"> --}}
						<tr>
							<td>{{ $stock->product->item_name }}</td>
							<td>{{ $stock->warehouse->name }} | {{ $stock->warehouse->location }} </td>
							<td>{{ number_format($stock->price, 0) }}</td>
							<td>{{ $stock->qty }}</td>
							<td>

							<div class="input-group input-group-sm">
								<input class="form-control " type="number" name="qty" id="qty" min="1" required max="{{ $stock->qty }}">
							</div>


							</td>
							<td>

								<button type="submit" class="btn btn-sm btn-danger">Process</button>

							</td>
						</tr>
					</form>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Stock available</p>
			<a href="{{ route('transactions.inbound') }}" class="btn btn-primary">Add Stock</a>
			@endif
		</div>
	</div>
</div>
@endsection