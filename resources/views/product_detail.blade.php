@extends('layouts.app')
@section('title', 'Input Product')

@section('content')
<div class="container" style="padding-top: 128px">
	<div class="card">
		<div class="card-body">
			{{-- Hisyam --}}
			<form action=" {{route('product.create')}}" method="post">
			@csrf
				<div class="form-group">
					<label for="item_name">Name</label>
					<input class="form-control" type="text" id="item_name" name="item_name">
				</div>

				<div>
					<label for="category">Category</label>
					<input class="form-control" type="text" name="category" id="category">
				</div>

				<div class="form-group">
					<label for="desc">Desc</label>
					<input class="form-control" type="text" id="desc" name="desc">
				</div>

				<div>
					<label for="volume">Volume</label>
					<input class="form-control" type="text" name="volume" id="volume">
				</div>
				<br>
				<button type="submit">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection