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
			<form action="{{route('transactions.create') . '?type=' . Request()->type }}" method="post">
				@csrf
				{{-- <div class="form-group">
					<label for="warehouse">Warehouse</label>
					<input class="form-control" type="text" name="warehouse" id="warehouse" placeholder="Choose Product...">
				</div> --}}

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="warehouse">Warehouse</label>
							<select class="form-control" name="warehouse" id="warehouse" value="{{ '?choosen='. Request()->choosen }}" onchange="location = '{{ route('transactions.outbound') }}' + this.value;">
								<option value="0">Choose Warehouse...</option>
								@foreach ($warehouses as $warehouse)
										<option value="{{ '?choosen='.$warehouse->id }}">{{ $warehouse->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

			</form>
			<div class="card mt-4">
				<div class="card-body">
					<td>
						<h3 class="font-weight-bold mb-2">Stock</h3>
					</td>
					@if(count($stocks))
					<table class="table table-bordered text-center">
						<thead class="thead-light">
							<tr>
								<th>
									Id
								</th>
								<th>
									Name
								</th>
								<th>
									Category
								</th>
								<th>
									Price
								</th>
								<th>
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
									<td>{{ $stock->id }}</td>
									<td>{{ $stock->product_id }}</td>
									<td>{{ $stock->category }}</td>
									<td>{{ $stock->price }}</td>
									<td></td>
									<td>{{ $stock->qty }}</td>
									<td>

									<div class="form-group">
										<input class="form-control" type="number" name="qty" id="qty" min="0" max="{{ $stock->qty }}">
									</div>


									</td>
									<td>

									<div>
										<button type="submit" class="btn btn-primary">Checkout</button>
									</div>

									</td>
								</tr>
							</form>
							@endforeach
						</tbody>
					</table>
					@else
					<p>Tidak ada Stok</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection