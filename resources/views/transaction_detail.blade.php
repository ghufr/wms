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
	<div class="row d-flex justify-content-center">
		<div class="col-8">
			<div class="card">
				<div class="card-body">
					{{-- Ghufron --}}
					<div class="d-flex justify-content-between">
						<div>
							<h4>{{ $transaction->product_name }}</h4>
							@if($transaction->type == 'inbound')
							<p>
								<span class="badge badge-primary">
									{{ $transaction->type }}
								</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
									<path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
								</svg>
								<span class="badge badge-primary">
									{{ $transaction->warehouse_name . ' | ' . $transaction->warehouse_location }}
								</span>
							</p>
							@else
							<p>
								<span class="badge badge-danger">
									{{ $transaction->warehouse_name . ' | ' . $transaction->warehouse_location }}
								</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
									<path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
								</svg>
								<span class="badge badge-danger">
									{{ $transaction->type }}
								</span>
							</p>
							@endif
						</div>
						<p class="mb-0">{{ $transaction->created_at }}</p>
					</div>
					<p class="mb-0">QTY: {{ $transaction->qty }}</p>
					<p class="mb-0">VOL: {{ $transaction->volume }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection