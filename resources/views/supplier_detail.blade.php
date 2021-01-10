@extends('layouts.app')

@if(Route::is('suppliers.input'))
@section('title', 'Add New Supplier')
@else
@section('title', 'Edit Supplier')
@endif

@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent

@section('content')
<div class="container-fluid" style="padding: 86px 52px">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					{{-- Cantika --}}
					<form action="{{ Route::is('suppliers.input') ? route('suppliers.create') : route('suppliers.update', ['id' => $supplier->id]) }}" method="post">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input class="form-control" type="text" id="name" name="name" value="{{ Route::is('suppliers.edit') ? $supplier->name : '' }}">
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input class="form-control" type="text" id="phone" name="phone" value="{{ Route::is('suppliers.edit') ? $supplier->phone : '' }}">
						</div>
						<div class="form-group">
							<label for="address_city">City</label>
							<input class="form-control" type="text" id="address_city" name="address_city" value="{{ Route::is('suppliers.edit') ? $supplier->address_city : '' }}">
						</div>
						<div class="form-group">
							<label for="address_street">Street</label>
							<textarea class="form-control" id="address_street" name="address_street">{{ Route::is('suppliers.edit') ? $supplier->address_street : '' }}</textarea>
						</div>
						<div class="text-right">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection