@extends('layouts.app')
@section('title', 'Suppliers')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- Cantika --}}
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>City</th>
				<th>Contact</th>
				<th>Product</th>
			</tr>
		</thead>
		<tbody>
			@for ($i = 0; $i < 10; $i++)
			<tr>
				<td>{{ $i + 1 }}</td>
				<td>PT Senja Abadi</td>
				<td>Jakarta</td>
				<td>+62003232232</td>
				<td>
					<span class="badge badge-secondary">Kain</span>
					<span class="badge badge-secondary">Jarum</span>
				</td>
			</tr>
			@endfor
		</tbody>
	</table>
</div>
@endsection