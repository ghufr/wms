@extends('layouts.app')
@section('title', 'Warehouse')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Dede --}}
	<div class="row ml-3">
		<!-- <h3>{{ null/*$warehouse->location*/ }}</h3> -->
		
		<div class="col">
			<h3>{{ $warehouse->name }} | {{ $warehouse->location }}</h3>
			<hr>
		<div>
	</div>
	<div class="row">
		<div class="col">
			<div class="row mb-3">
				<div class="col row-4">
					<div class="card">
						<table>
							<div class="card-body">
								<tr>
									<td>
										<h3 class="font-weight-bold ml-5">{{ $warehouse->volume }}</h3>
										<p class="ml-5 mb-4">[Products' Volume]</p>
									</td>
									<td>
										<h3 class="font-weight-bold ml-5">{{ $warehouse->volume }}</h3>
										<p class="ml-5 mb-4">[Warehouse's Volume]</p>
									</td>
								</tr>
							</div>
						</table>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<td>
						<h3 class="font-weight-bold mb-2">Stock</h3>
					</td>
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr>
								<th>
									No.
								</th>
								<th>
									Name
								</th>
								<th>
									Category
								</th>
								<th>
									Quantity
								</th>
								<th>
									Price
								</th>
							</tr>
						</thead>
						<tbody>
							@for ($i = 0; $i < 10; $i++)
							<tr>
								<td>{{$i}}</td>
								<td>Name</td>
								<td>Material</td>
								<td>[total jumlah barang di nama produk]</td>
								<td>[total jumlah harga di nama produk]</td>
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
					<h5>Staff Assigned</h5>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Widodo</li>
						<li class="list-group-item">Maaplur Amin</li>
						<li class="list-group-item">Awal Bowo</li>
						<li class="list-group-item">Sedia Remi</li>
					</ul>
				</div>
			</div>
			<div class="mt-3">
				<button class="btn-block btn-outline-success font-weight-bold" data-toggle="modal" data-target="#InsertModal">Edit Warehouse Detail</button>
			</div>
		</div>
	</div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="InsertModal" tabindex="-1" aria-labelledby="InsertModalLabel" aria-hidden="true">
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
                
                <div class="form-group">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <button class="btn btn-secondary float-md-right" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <button type="submit" class="btn btn-primary float-md-right">
                                <a style="color:white">Edit Warehouse</a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection