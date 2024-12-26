@extends('layouts.app')

@section('title', 'Wisata')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wisata</li>
        </ol>
    </nav>
    <h1 class="text-center mb-4">Wisata di Desa Pelita</h1>

    <!-- Pencarian dan Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('wisata.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari wisata..." value="{{ request()->query('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-end">
            <form action="{{ route('wisata.index') }}" method="GET">
                <div class="input-group">
                    <select name="filter" class="form-select" onchange="this.form.submit()">
                        <option value="">Filter</option>
                        <option value="popular" {{ request()->query('filter') == 'popular' ? 'selected' : '' }}>Populer</option>
                        <option value="recent" {{ request()->query('filter') == 'recent' ? 'selected' : '' }}>Terbaru</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Wisata -->
    <div class="row mb-4">
        @forelse ($wisatas as $wisata)
        <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $wisata->gambar) }}" class="card-img-top" alt="{{ $wisata->nama }}" style="max-width: 100%; height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $wisata->nama }}</h5>
                    <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}</p>
                    <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center" role="alert">
                Pencarian tidak ditemukan.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $wisatas->links() }}
    </div>
</div>
@endsection