@extends('layouts.app')
@section('title', 'Warehouse')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Dede --}}
	<div class="row">
		@foreach($warehouses as $warehouse)
		<div class="col col-md-4 mb-4">
			<div class="card card-hover border-0 shadow">
				<img src="https://ik.imagekit.io/carro/jualo/original/22582107/lowongan-terbaru-2019-lowongan-lainnya-22582107.jpg?v=1575856193" alt="Gudang" class="card-img-top">
				<div class="card-body">
					<h5 class="font-weight-bold text-primary">{{ $warehouse->name }}</h5>
					<p class="mb-0">{{ $warehouse->location }}</p>
					<a href="{{ route('warehouse.show', ['id' => $warehouse->id]) }}" class="stretched-link">
					</a>
				</div>
			</div>
		</div>
		@endforeach
		<div class="col col-md-4 mb-4">
			<div class="card card-hover border-0 shadow">
				<img src="https://png.pngtree.com/element_our/20190523/ourmid/pngtree-green-plus-sign-simple-logo-image_1082145.jpg"
				alt="Add Warehouse" class="card-img-top">
				<div class="card-body">
					<a class="card-block stretched-link text-decoration-none" 
					data-toggle="modal" data-target="#InsertModal" href>
						<h5 class="font-weight-bold text-center">Add Warehouse</h5>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Insert Modal -->
<div class="modal fade" id="InsertModal" tabindex="-1" aria-labelledby="InsertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Warehouse</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('warehouse.create') }}" method="post" enctype="multipart/form-data">
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
                                <a style="color:white">Add Warehouse</a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
