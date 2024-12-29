@extends('layouts.app')

@section('title', $kuliner->nama)

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kuliner.index') }}">Kuliner</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $kuliner->nama }}</li>
        </ol>
    </nav>
    <h1 class="text-center mb-4">{{ $kuliner->nama }}</h1>
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('storage/' . $kuliner->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $kuliner->nama }}">
            <div class="mt-3">
                <h5 class="text-primary">Kontak Kami</h5>
                <a href="{{ $kuliner->instagram }}" class="btn btn-outline-primary me-2" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="{{ $kuliner->whatsapp }}" class="btn btn-outline-success me-2" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="{{ $kuliner->tiktok }}" class="btn btn-outline-dark" target="_blank"><i class="fab fa-tiktok"></i> TikTok</a>
            </div>
        </div>
        <div class="col-md-4">
            <h5 class="text-primary">Deskripsi</h5>
            <p class="text-muted">{{ $kuliner->deskripsi }}</p>
            <h5 class="text-primary">Lokasi</h5>
            <div class="embed-responsive embed-responsive-16by9">
                {!! $kuliner->lokasi !!}
            </div>
            <h5 class="text-primary">Harga</h5>
            <p class="text-muted">{{ $kuliner->harga }}</p>
            <h5 class="text-primary">Jam Operasional</h5>
            <p class="text-muted">{{ $kuliner->jam_operasional }}</p>
            <h5 class="text-primary">Rating</h5>
            <p class="text-muted">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < round($averageRating))
                        <span class="fa fa-star checked"></span>
                    @else
                        <span class="fa fa-star"></span>
                    @endif
                @endfor
                ({{ round($averageRating, 1) }} dari 5)
            </p>
            <h5 class="text-primary">Fasilitas</h5>
            <ul class="text-muted">
                @foreach (explode("\n", $kuliner->fasilitas) as $fasilitas)
                    <li>{{ $fasilitas }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Daftar Testimoni -->
    <div class="mt-5">
        <h3 class="text-center mb-4">Testimoni Pengunjung</h3>
        @foreach ($testimonis as $testimoni)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $testimoni->nama }}</h5>
                <p class="card-text">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $testimoni->rating)
                            <span class="fa fa-star checked"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    @endfor
                    ({{ $testimoni->rating }} dari 5)
                </p>
                <p class="card-text">{{ $testimoni->pesan }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Form Testimoni -->
    <div class="mt-5">
        <h3 class="text-center mb-4">Berikan Testimoni Anda</h3>
        <form action="{{ route('testimoni.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kuliner_id" value="{{ $kuliner->id }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <div class="rating">
                    <input type="radio" name="rating" id="rating-5" value="5"><label for="rating-5" class="fa fa-star"></label>
                    <input type="radio" name="rating" id="rating-4" value="4"><label for="rating-4" class="fa fa-star"></label>
                    <input type="radio" name="rating" id="rating-3" value="3"><label for="rating-3" class="fa fa-star"></label>
                    <input type="radio" name="rating" id="rating-2" value="2"><label for="rating-2" class="fa fa-star"></label>
                    <input type="radio" name="rating" id="rating-1" value="1"><label for="rating-1" class="fa fa-star"></label>
                </div>
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
        </form>
    </div>

    <div class="mt-4">
        <a href="{{ route('kuliner.index') }}" class="btn btn-secondary">Kembali ke Daftar Kuliner</a>
    </div>
</div>

<style>
    .checked {
        color: orange;
    }
    .rating {
        direction: rtl;
        display: inline-flex;
    }
    .rating > input {
        display: none;
    }
    .rating > label {
        font-size: 2rem;
        color: #ddd;
        cursor: pointer;
    }
    .rating > input:checked ~ label,
    .rating > input:hover ~ label,
    .rating > label:hover ~ label {
        color: orange;
    }
</style>
@endsection