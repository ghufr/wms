@extends('layouts.app')
@section('title', 'Warehouse')
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Dede --}}
	<div class="row">
		@foreach($warehouses as $warehouse)
		<div class="col col-md-3 mb-4">
			<div class="card card-hover border-0 shadow">
				{{-- <img src="https://ik.imagekit.io/carro/jualo/original/22582107/lowongan-terbaru-2019-lowongan-lainnya-22582107.jpg?v=1575856193" alt="Gudang" class="card-img-top"> --}}
				<div class="card-body">
					<h5 class="font-weight-bold text-primary">{{ $warehouse->name }}</h5>
					<p class="mb-0">{{ $warehouse->location }}</p>
					<a href="{{ route('warehouse.show', ['id' => $warehouse->id]) }}" class="stretched-link">
                    </a>
				</div>
			</div>
		</div>
		@endforeach
		<div class="col col-md-3 mb-4">
			<div class="card h-100 card-hover border-0 shadow">
				{{-- <img src="https://png.pngtree.com/element_our/20190523/ourmid/pngtree-green-plus-sign-simple-logo-image_1082145.jpg"
				alt="Add Warehouse" class="card-img-top"> --}}
				<div class="card-body d-flex align-items-center justify-content-center">
                    <a class="card-block stretched-link text-decoration-none text-center text-success"
                    data-toggle="modal" data-target="#InsertModal" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                    </svg>
						<h5 class="mb-0 font-weight-bold">Add Warehouse</h5>
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
                                Add Warehouse
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
