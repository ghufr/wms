@extends('layouts.app')
@section('title', 'Dashboard')
@section('username', Auth::user()->name)

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
							<h3 class="font-weight-bold">{{ $product_count }}</h3>
							<p class="mb-0">Products</p>
						</div>
					</div>
				</div>
				<div class="col col-6 col-md-4">
					<div class="card">
						<div class="card-body">
							<h3 class="font-weight-bold">{{ $warehouse_count }}</h3>
							<p class="mb-0">Warehouses</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="mb-3 d-flex align-items-center justify-content-between">
						<h5 class="font-weight-bold">Users</h5>
					</div>
					@if(count($users) > 0)
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr>
								<th>
									#
								</th>
								<th>
									Name
								</th>
								<th>
									Email
								</th>
								<th>
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }} <span class="badge badge-{{ $user->role === 'manager' ? 'primary' : 'secondary' }}">{{ ucfirst($user->role) }}</span></td>
								<td>{{ $user->email }}</td>
								<td>
									<button class="btn btn-sm btn-outline-primary">Change Role</button>
									<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-danger">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<p>Belum ada user lain</p>
					@endif
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
