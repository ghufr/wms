@extends('layouts.app')
@section('title', 'Transactions')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Ghufron --}}
	<div class="text-right mb-3">
	</div>
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<div class="mb-3 d-flex justify-content-between">
						<h3>Inbound</h3>
						<a href="{{ route('transactions.input') }}">
							<button class="btn btn-primary">
								In (+)
							</button>
						</a>
					</div>

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
				</div>
			</div>

		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<div class="mb-3 d-flex justify-content-between">
						<h3>Outbound</h3>
						<button class="btn btn-sm btn-danger">Out (-)</button>
					</div>
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
				</div>
			</div>

		</div>
	</div>
</div>
@endsection