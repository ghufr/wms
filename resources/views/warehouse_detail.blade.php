@extends('layouts.app')
@section('title', 'Warehouse')
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent
@section('content')
<div class="container-liquid" style="padding: 86px 52px">
	{{-- Dede --}}
	<div class="row">
		<div class="col">
			<h3>{{ $warehouse->name }} | {{ $warehouse->location }}</h3>
			<hr>
		<div>
	</div>
	<div class="row">
		<div class="col">
			<div class="row mb-3">
				<div class="col col-4">
					<div class="card">
						<div class="card-body">
							<h3 class="font-weight-bold">{{ number_format($used) }}</h3>
							<p class="mb-0">Used Volume</p>
						</div>
					</div>
				</div>
				<div class="col col-4">
					<div class="card">
						<div class="card-body">
							<h3 class="font-weight-bold">{{ number_format($warehouse->volume) }}</h3>
							<p class="mb-0">Total Volume</p>
						</div>
					</div>
				</div>
				<div class="col col-4">
					<div class="card">
						<div class="card-body">
							<h3 class="font-weight-bold">{{ number_format($left) }}</h3>
							<p class="mb-0">Volume Left</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<td>
						<h3 class="font-weight-bold mb-3">Stock</h3>
					</td>
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr>
								<th>
									#
								</th>
								<th>
									Product
								</th>
								<th>
									Category
								</th>
								<th>
									Avg. Value
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($stocks as $stock)
							<tr>
								<td>{{ $stock->id }}</td>
								<td>{{ $stock->product->item_name }}</td>
								<td>
									<span class="badge badge-primary">
									{{ $stock->category }}
									</span>
								</td>
								<td>{{ number_format($stock->qty * $stock->price) }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col col-4">
			<div class="card">
				<div class="card-body">
					<h5>Staff Assigned</h5>
					@if(count($staff) >0)
					<ul class="list-group list-group-flush">
						@foreach($staff as $st)
						<li class="list-group-item">
							{{ $st->name }}
							<a href="{{ route('warehouse.deleteStaff', ['id' => $warehouse->id, 'userId' => $st->id]) }}" class="float-right btn btn-xs btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
								<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
							</svg></a>
						</li>
						@endforeach

					</ul>
					@else
					<p>No Staff Assigned</p>
					@endif
					@if(count($users) > 0)
						<button data-toggle="modal" data-target="#addStaffModal" class="btn btn-sm btn-primary">New Staff</button>
					@endif
				</div>
			</div>
			{{-- <div class="mt-3">
				<button class="btn btn-block btn-secondary font-weight-bold" data-toggle="modal" data-target="#insertModal">Edit Warehouse</button>
			</div> --}}
		</div>
	</div>
</div>


{{-- Add Staff Modal --}}
<div>
	<div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title">Add Staff</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
						<form action="{{ route('warehouse.addStaff', ['id' => $warehouse->id]) }}" method="post" enctype="multipart/form-data">
							@csrf
							<select class="form-control" name="user" id="user">
								@foreach($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
							<div class="text-right mt-3">
								<button class="btn btn-secondary" data-dismiss="modal">
									Cancel
								</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
				</div>
		</div>
	</div>
	{{-- Edit Warehouse Modal --}}
	<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="InsertModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Warehouse</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
					<form action="{{ route('warehouse.edit', ['id' => $warehouse->id]) }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group row">
									<label for="name" class="col-sm-4 col-form-label">Nama</label>
									<div class="col-sm-8">
											<input type="text" class="form-control" id="name" name="name" value="" placeholder="Elang">
									</div>
							</div>
							<div class="form-group row">
									<label for="location" class="col-sm-4 col-form-label">Location</label>
									<div class="col-sm-8">
											<input type="text" class="form-control" id="location" name="location" value="">
									</div>
							</div>
							<div class="form-group row">
									<label for="volume" class="col-sm-4 col-form-label">Volume</label>
									<div class="col-sm-8">
											<input type="text" class="form-control" id="volume" name="volume" value="">
									</div>
							</div>

							<button class="btn btn-secondary" data-dismiss="modal">
									Cancel
							</button>
							<button type="submit" class="btn btn-primary">
									Submit
							</button>
					</form>
			</div>
		</div>
	</div>
</div>

@endsection