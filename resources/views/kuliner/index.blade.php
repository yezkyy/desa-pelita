@extends('layouts.app')

@section('title', 'Kuliner')

@section('content')
<h1>Kuliner di Desa Pelita</h1>
<div class="row">
    @foreach ($kuliners as $kuliner)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('storage/' . $kuliner->gambar) }}" class="card-img-top" alt="{{ $kuliner->nama }}">
            <div class="card-body">
                <h5 class="card-title">{{ $kuliner->nama }}</h5>
                <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($kuliner->deskripsi, 100) }}</p>
                <a href="#" class="btn btn-success btn-sm">Coba Sekarang</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
