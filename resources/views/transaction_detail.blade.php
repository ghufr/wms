@extends('layouts.app')
@section('title', 'Input Transaction')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	<div class="row">
		<div class="col-8">
			<div class="card">
				<div class="card-body">
					{{-- Ghufron --}}
					<form action="{{route('transactions.create')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="product">Product</label>
							<select class="form-control" name="product" id="product">
								<option value="A">Product A</option>
							</select>
						</div>
						<div class="form-group">
							<label for="warehouse">Warehouse</label>
							<select class="form-control" name="warehouse" id="warehouse">
								<option value="A">Warehouse A</option>
							</select>
						</div>
						<div class="form-group">
							<label for="supplier">Supplier</label>
							<select class="form-control" name="supplier" id="supplier">
								<option value="A">Supplier A</option>
							</select>
						</div>
						<div class="form-group">
							<label for="qty">Quantity</label>
							<input class="form-control" type="number" name="qty" id="qty">
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input class="form-control" type="number" name="price" id="price">
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