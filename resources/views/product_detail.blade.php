@extends('layouts.app')
@section('title', 'Input Product')
@section('username', Auth::user()->name)

@component('components.topbar')
@endcomponent

@section('content')
<div class="container-fluid" style="padding: 86px 52px">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					{{-- Hisyam --}}
					<form action="{{ Route::is('products.input') ? route('products.create') : route('products.update', ['id' => $product->id]) }}" method="post">
						@csrf
						<div class="form-group">
							<label for="item_name">Name</label>
							<input class="form-control" type="text" id="item_name" name="item_name" required value="{{ Route::is('products.edit') ? $product->item_name : '' }}">
						</div>

						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" name="category" id="category" required value="{{ Route::is('products.edit') ? $product->category : '' }}">
								@foreach($categories as $category)
								<option value={{ $category->id }}>{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="desc">Description</label>
							<textarea class="form-control" id="desc" name="desc">{{ Route::is('products.edit') ? $product->desc : '' }}</textarea>
						</div>

						<div class="form-group" style="max-width: 128px">
							<label for="volume">Volume</label>
							<input class="form-control" type="number" min="0" name="volume" id="volume" value="{{ Route::is('products.edit') ? $product->volume : '' }}">
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