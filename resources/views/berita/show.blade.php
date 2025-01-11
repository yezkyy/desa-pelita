@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $berita->judul }}</li>
        </ol>
    </nav>
    <h1 class="text-center mb-4">{{ $berita->judul }}</h1>
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $berita->judul }}">
            <div class="mt-3">
                <p class="text-muted">{{ $berita->konten }}</p>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali ke Daftar Berita</a>
    </div>
</div>
@endsection