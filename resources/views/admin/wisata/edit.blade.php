@extends('layouts.app')

@section('title', 'Edit Wisata')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Wisata</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.wisata.update', $wisata->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $wisata->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $wisata->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            @if ($wisata->gambar)
                                <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}" style="width: 100px;" class="mt-2">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Update Wisata</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection