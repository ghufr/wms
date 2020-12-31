@extends('layouts.app')
@section('title', 'Warehouse')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Dede --}}
	<div class="row">
		@for ($i = 0; $i < 12; $i++)
		<div class="col col-md-4 mb-4">
			<div class="card card-hover border-0 shadow">
				<img src="https://ik.imagekit.io/carro/jualo/original/22582107/lowongan-terbaru-2019-lowongan-lainnya-22582107.jpg?v=1575856193" alt="Gudang" class="card-img-top">
				<div class="card-body">
					<h5 class="font-weight-bold text-primary">Gudang Utama</h5>
					<p class="mb-0">Jakarta</p>
					<p class="mb-0 text-success">
						<small>
							Available
						</small>
					</p>
					<a href="{{ route('warehouse', $i) }}" class="stretched-link">
					</a>
					</div>
				</div>
		</div>
		@endfor
	</div>
</div>
@endsection