@extends('layouts.app')
@section('title', 'Categories')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container pb-5" style="padding-top: 128px">
	{{-- Fildzah --}}
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@for ($i = 0; $i < 10; $i++)
			<tr>
				<td>{{ $i + 1 }}</td>
				<td>Kain</td>
				<td>Kain katun combed 24s</td>
				<th>
					<button class="btn btn-sm btn-outline-success">Edit</button>
				</th>

			</tr>
			@endfor
		</tbody>
	</table>
</div>
@endsection