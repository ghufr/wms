@extends('layouts.app')
@section('title', 'Transactions')

@component('components.topbar')
@endcomponent
@section('content')
<div class="container" style="padding-top: 128px">
	{{-- TODO: Add Inbound/Outbound UI --}}
	{{-- Ghufron --}}
	<div class="row">
		<div class="col-6">
			<h3>Inbound</h3>
		</div>
		<div class="col-6">
			<h3>Outbound</h3>
		</div>
	</div>
</div>
@endsection