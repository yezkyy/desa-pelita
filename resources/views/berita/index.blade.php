@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Berita Terbaru</h1>
    <div class="row mb-4">
        @forelse ($beritas as $berita)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="max-width: 100%; height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->judul }}</h5>
                    <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($berita->konten, 100) }}</p>
                    <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center" role="alert">
                Tidak ada berita ditemukan.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $beritas->links() }}
    </div>
</div>
@endsection