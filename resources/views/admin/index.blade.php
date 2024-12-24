@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manage Wisata</h5>
                    <p class="card-text">Add, edit, and delete wisata entries.</p>
                    <a href="{{ route('admin.wisata.index') }}" class="btn btn-primary">Go to Wisata</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manage Kuliner</h5>
                    <p class="card-text">Add, edit, and delete kuliner entries.</p>
                    <a href="{{ route('admin.kuliner.index') }}" class="btn btn-primary">Go to Kuliner</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection