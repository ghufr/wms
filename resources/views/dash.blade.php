@extends('layouts.app')
@section('title', 'Dashboard')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container pb-5" style="padding-top: 128px">
	{{-- Ghufron --}}
	<div class="row">
		<div class="col col-8">
			<div class="row mb-3">
				<div class="col col-6 col-md-4">
					<div class="card">
						<div class="card-body">
							<h3 class="font-weight-bold">Rp 120M</h3>
							<p class="mb-0">Inventory Value</p>
						</div>
					</div>
				</div>
				<div class="col col-6 col-md-4">
					<div class="card">
						<div class="card-body">
							<h3 class="font-weight-bold">23</h3>
							<p class="mb-0">Items</p>
						</div>
					</div>
				</div>
				<div class="col col-6 col-md-4">
					<div class="card">
						<div class="card-body">
							<h3 class="font-weight-bold">5</h3>
							<p class="mb-0">Warehouses</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="mb-3 d-flex align-items-center justify-content-between">
						<h5>Products</h5>
						<button class="btn btn-sm btn-primary">Add New Product</button>
					</div>
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr>
								<th>
									SKU
								</th>
								<th>
									Name
								</th>
								<th>
									Category
								</th>
								<th>
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							@for ($i = 0; $i < 10; $i++)
							<tr>
								<td>00{{$i}}</td>
								<td>Item 1</td>
								<td>Material</td>
								<td>
									<button class="btn btn-sm btn-outline-success">Edit</button>
								</td>
							</tr>
							@endfor
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col col-4">
			<div class="card">

				<div class="card-body">
					<h5>Recent Activities</h5>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Cras justo odio</li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Morbi leo risus</li>
						<li class="list-group-item">Porta ac consectetur ac</li>
						<li class="list-group-item">Vestibulum at eros</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
