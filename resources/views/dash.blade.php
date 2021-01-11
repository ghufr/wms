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
							<h3 class="font-weight-bold">$ {{ number_format ($value, 0) }}</h3>
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
					{{-- <form action="" method="get">
						<div class="form-group d-flex">
							<input class="form-control" type="text" name="user" id="user" placeholder="Search user...">
							<button class="ml-3 btn btn-primary">Search</button>
						</div>
					</form> --}}

					@if(count($users) > 0)
					<table class="table">
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
								<th class="fit">
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
								<td class="fit">
									{{-- <button class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg></button> --}}
									<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-danger">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
											<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
										</svg></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<p>There is no other users</p>
					@endif
				</div>
			</div>
		</div>
		<div class="col col-4">
			<div class="card">

				<div class="card-body">
					<h5>User Registration</h5>
					@if(count($regists) > 0)
					<ul class="list-group list-group-flush">
						@foreach($regists as $regist)
							<li class="list-group-item">{{ $regist->name }} <span class="float-right">
								<a class="btn btn-xs btn-danger" href="{{ route('user.decline', ['id' => $regist->id])}}">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
										<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
									</svg>
								</a>
								<a class="btn btn-xs btn-success" href="{{ route('user.accept', ['id' => $regist->id]) }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</a>
							</span></li>
						@endforeach
					</ul>
					@else
					<p>No pending approval request</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
