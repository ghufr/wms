@extends('layouts.app')
@section('title', 'Transactions')
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent
@section('content')
<div class="container-fluid" style="padding: 86px 52px">
	{{-- Ghufron --}}

	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<div class="mb-3 d-flex justify-content-between">
						<h3>Inbound</h3>
						<a href="{{ route('transactions.inbound', ['type' => 'inbound']) }}">
							<button class="btn btn-sm btn-primary">
								Add Inbound
							</button>
						</a>
					</div>

					@if($inbound)
					<table class="table">
						<thead class="font-weight-bold">
								<th>
									Product
								</th>
								<th>Qty</th>
								<th>Warehouse</th>
								<th class="fit"></th>
						</thead>
						<tbody>
							@foreach($inbound as $in)
							<tr class="fit">
								<td>{{ $in->product_name }}</td>
								<td>{{ $in->qty }}</td>
								<td>{{ $in->warehouse_name }}</td>
								<td class="fit">
									<a href="{{ route('transactions.detail', ['id' => $in->id]) }}" class="btn text-secondary">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
											<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
											<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
										</svg>
									</a>
								</td>
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
							<button class="btn btn-sm btn-danger">Add Outbound</button>
						</a>
					</div>
					@if($outbound)
					<table class="table">
						<thead class="font-weight-bold">
							<th>
								Product
							</th>
							<th>Qty</th>
							<th>Warehouse</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($outbound as $out)
							<tr>
								<td>{{ $out->product_name }}</td>
								<td>{{ $out->qty }}</td>
								<td>{{ $out->warehouse_name }}</td>
								<td class="fit">
									<a href="{{ route('transactions.detail', ['id' => $out->id]) }}" class="btn text-secondary">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
											<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
											<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
										</svg>
									</a>
								</td>
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