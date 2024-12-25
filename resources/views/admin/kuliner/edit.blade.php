@extends('layouts.app')

@section('title', 'Edit Kuliner')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kuliner.index') }}">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kuliner</li>
        </ol>
    </nav>
    <h1 class="text-center mb-4">Edit Kuliner</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.kuliner.update', $kuliner->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kuliner->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $kuliner->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            @if ($kuliner->gambar)
                                <img src="{{ asset('storage/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama }}" style="width: 100px;" class="mt-2">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Update Kuliner</button>
                    </form>
                    <a href="{{ route('admin.kuliner.index') }}" class="btn btn-secondary w-100 mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection