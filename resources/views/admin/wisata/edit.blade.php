@extends('layouts.app')

@section('title', 'Edit Wisata')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.wisata.index') }}">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Wisata</li>
        </ol>
    </nav>
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
                        <div class="mb-3">
                            <label for="jam_operasional" class="form-label">Jam Operasional</label>
                            <input type="text" class="form-control" id="jam_operasional" name="jam_operasional" value="{{ $wisata->jam_operasional }}">
                        </div>
                        <div class="mb-3">
                            <label for="harga_tiket" class="form-label">Harga Tiket</label>
                            <input type="text" class="form-control" id="harga_tiket" name="harga_tiket" value="{{ $wisata->harga_tiket }}">
                        </div>
                        <div class="mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas</label>
                            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3">{{ $wisata->fasilitas }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi (Embed Google Maps)</label>
                            <textarea class="form-control" id="lokasi" name="lokasi" rows="3">{{ $wisata->lokasi }}</textarea>
                            <small class="form-text text-muted">Masukkan embed code dari Google Maps.</small>
                        </div>
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="url" class="form-control" id="instagram" name="instagram" value="{{ $wisata->instagram }}" placeholder="https://instagram.com/username">
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">WhatsApp</label>
                            <input type="url" class="form-control" id="whatsapp" name="whatsapp" value="{{ $wisata->whatsapp }}" placeholder="https://wa.me/phone_number">
                        </div>
                        <div class="mb-3">
                            <label for="tiktok" class="form-label">TikTok</label>
                            <input type="url" class="form-control" id="tiktok" name="tiktok" value="{{ $wisata->tiktok }}" placeholder="https://tiktok.com/@username">
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Update Wisata</button>
                    </form>
                    <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary w-100 mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection