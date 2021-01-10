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
		<div class="col-8">
			<div class="card">
				<div class="card-body">
					{{-- Ghufron --}}
					<form action="{{route('transactions.create') . '?type=' . Request()->type }}" method="post">
						@csrf
						{{-- <div class="form-group">
							<label for="product">Product</label>
							<input class="form-control" type="text" name="product" id="product" placeholder="Choose Product...">
						</div> --}}

						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="product">Product</label>
									<select class="form-control" name="product" id="product">
										@foreach ($products as $product)
												<option value="{{ $product->id }}">{{ $product->item_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="supplier">Supplier</label>
									<select class="form-control" name="supplier" id="supplier">
										@foreach ($suppliers as $supplier)
											<option value="{{ $supplier->id }}">{{ $supplier->name . "-" . $supplier->address_city }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="warehouse">Warehouse</label>
							<select class="form-control" name="warehouse" id="warehouse">
								@foreach ($warehouses as $warehouse)
									<option value="{{ $warehouse->id }}">{{ $warehouse->name . "-" . $warehouse->location }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-row">
							<div class="col">
								<div class="form-group">
									<label for="qty">Quantity</label>
									<input class="form-control" type="number" name="qty" id="qty" min="0">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="price">Price</label>
									<input class="form-control" type="number" name="price" id="price" min="0">
								</div>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection