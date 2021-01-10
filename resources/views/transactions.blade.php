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
						<a href="{{ route('transactions.inbound') }}">
							<button class="btn btn-sm btn-primary">
								In (+)
							</button>
						</a>
					</div>

					@if($inbound)
					<table class="table">
						<thead>

								<td>
									Created At
								</td>
								<td>Product</td>
								<td>Quantity</td>
						</thead>
						<tbody>
							<tr>
								<td>2020/01/01</td>
								<td>Kaos Putih Polos</td>
								<td>100</td>

							</tr>
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
						<a href="{{ route('transactions.outbound') }}">
							<button class="btn btn-sm btn-danger">Out (-)</button>
						</a>
					</div>
					@if($outbound)
					<table class="table">
						<thead>

								<td>
									Created At
								</td>
								<td>Product</td>
								<td>Quantity</td>
						</thead>
						<tbody>
							<tr>
								<td>2020/01/02</td>
								<td>Kaos Putih Polos</td>
								<td>50</td>
							</tr>
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