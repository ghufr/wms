@extends('layouts.blank')
@section('title', 'Home')
@section('content')
<div class="container h-100 d-flex justify-center align-items-center">
    <div class="text-center w-100">
        <p class="mb-0">Welcome to</p>
        <h3 class="mb-5">Warehouse Management System</h3>
        <div>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
        </div>
    </div>
</div>
