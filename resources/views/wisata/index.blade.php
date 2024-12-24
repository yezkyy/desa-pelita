@extends('layouts.app')

@section('title', 'Wisata')

@section('content')
<h1>Wisata di Desa Pelita</h1>
<div class="row">
    @foreach ($wisatas as $wisata)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('storage/' . $wisata->gambar) }}" class="card-img-top" alt="{{ $wisata->nama }}">
            <div class="card-body">
                <h5 class="card-title">{{ $wisata->nama }}</h5>
                <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}</p>
                <a href="#" class="btn btn-primary btn-sm">Selengkapnya</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection