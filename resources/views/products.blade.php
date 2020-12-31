@extends('layouts.app')
@section('title', 'Products')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Hisyam --}}
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Category</th>
				<th>Volume</th>
			</tr>
		</thead>
		<tbody>
			@for ($i = 0; $i < 10; $i++)
			<tr>
				<td>{{ $i + 1 }}</td>
				<td>Kain Kafan</td>
				<td>Bahan</td>
				<td>20</td>
			</tr>
			@endfor
		</tbody>
	</table>
</div>
@endsection