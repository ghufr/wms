@extends('layouts.app')
@section('title', 'Transactions')
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent
@section('content')
<div class="container-fluid" style="padding: 86px 52px">
	{{-- Ghufron --}}

	<div class="mb-3">
		<form action="" style="max-width: 400px">

			<select class="form-control" name="" id="">
				<option value="0">All Warehouses</option>
				<option value="1">Warehouse A</option>
				<option value="2">Warehouse B</option>
			</select>
		</form>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<div class="mb-3 d-flex justify-content-between">
						<h3>Inbound</h3>
						<a href="{{ route('transactions.inbound', ['type' => 'inbound']) }}">
							<button class="btn btn-sm btn-primary">
								In (+)
							</button>
						</a>
					</div>

					@if($inbound)
					<table class="table">
						<thead>
								<td>
									Product
								</td>
								<td>Qty</td>
								<td>Warehouse</td>
						</thead>
						<tbody>
							@foreach($inbound as $in)
							<tr>
								<td>{{ $in->product_name }}</td>
								<td>{{ $in->qty }}</td>
								<td>{{ $in->warehouse_name }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<p>Belum ada transaksi Inbound</p>
					@endif
				</div>
			</div>

		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<div class="mb-3 d-flex justify-content-between">
						<h3>Outbound</h3>
						<a href="{{ route('transactions.outbound', ['type' => 'outbound']) }}">
							<button class="btn btn-sm btn-danger">Out (-)</button>
						</a>
					</div>
					@if($outbound)
					<table class="table">
						<thead>
							<td>
								Product
							</td>
							<td>Qty</td>
							<td>Warehouse</td>
						</thead>
						<tbody>
							@foreach($outbound as $out)
							<tr>
								<td>{{ $out->product_name }}</td>
								<td>{{ $out->qty }}</td>
								<td>{{ $out->warehouse_name }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<p>Belum ada transaksi outbound</p>
					@endif
				</div>
			</div>

		</div>
	</div>
</div>
@endsection