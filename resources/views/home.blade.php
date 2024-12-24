@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Section Home -->
<div class="parallax-section text-center text-white d-flex align-items-center justify-content-center" data-aos="fade-up">
    <div class="content">
        <h1 class="display-4 mb-4">Selamat Datang di Desa Pelita</h1>
        <p class="lead mb-4">Desa yang penuh keindahan, budaya, dan kuliner khas.</p>
        <a href="#about" class="btn btn-primary btn-lg mt-4 custom-btn">Jelajahi Lebih Lanjut</a>
    </div>
</div>

<!-- Section About -->
<section id="about" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4">Tentang Desa Pelita</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-muted">
                    Desa Pelita adalah sebuah desa yang menawarkan keindahan alam, budaya lokal, dan cita rasa kuliner yang menggugah selera. 
                    Dengan berbagai destinasi wisata alam yang memukau, desa ini juga kaya akan sejarah dan tradisi yang diwariskan turun temurun.
                </p>
                <p class="text-muted">
                    Temukan pengalaman unik dan tak terlupakan hanya di Desa Pelita. 
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/desa-pelita.png') }}" alt="Tentang Desa Pelita" class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</section>

<!-- Section Wisata -->
<section id="wisata" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4">Wisata Populer</h2>
        <div class="row">
            @foreach ($wisatas->take(3) as $wisata)
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100 shadow-sm">
                    @if ($wisata->gambar)
                        <img src="{{ asset('storage/' . $wisata->gambar) }}" class="card-img-top" alt="{{ $wisata->nama }}" style="max-width: 100%; height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Image" style="max-width: 100%; height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $wisata->nama }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('wisata.index') }}" class="btn btn-outline-primary">Selengkapnya</a>
        </div>
    </div>
</section>

<!-- Section Kuliner -->
<section id="kuliner" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4">Kuliner Lezat</h2>
        <div class="row">
            @foreach ($kuliners->take(3) as $kuliner)
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $kuliner->gambar) }}" class="card-img-top" alt="{{ $kuliner->nama }}" style="max-width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $kuliner->nama }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($kuliner->deskripsi, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('kuliner.index') }}" class="btn btn-outline-primary">Selengkapnya</a>
        </div>
    </div>
</section>

<!-- Section Testimonials -->
<section id="testimonials" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4">Testimoni Pengunjung</h2>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="card-text text-muted">"Desa Pelita adalah tempat yang luar biasa! Keindahan alamnya memukau dan budayanya sangat menarik."</p>
                        <h5 class="card-title text-primary">- Budi Santoso</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="card-text text-muted">"Kuliner di Desa Pelita sangat lezat dan beragam. Saya sangat menikmati setiap hidangan yang saya coba."</p>
                        <h5 class="card-title text-primary">- Siti Aminah</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="card-text text-muted">"Pengalaman yang tak terlupakan! Desa Pelita benar-benar menawarkan sesuatu yang unik dan berbeda."</p>
                        <h5 class="card-title text-primary">- Andi Wijaya</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Contact -->
<section id="contact" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4">Kontak Kami</h2>
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Anda">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Pesan Anda"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
            <div class="col-md-6">
                <h5 class="text-primary">Alamat</h5>
                <p class="text-muted">Jl. Raya Desa Pelita No. 123, Kabupaten Pelita, Indonesia</p>
                <h5 class="text-primary">Telepon</h5>
                <p class="text-muted">+62 123 4567 890</p>
                <h5 class="text-primary">Email</h5>
                <p class="text-muted">info@desapelita.com</p>
            </div>
        </div>
    </div>
</section>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .parallax-section {
        height: 100vh;
        background: url('{{ asset('assets/background.png') }}') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
        width: 100vw;
        margin-left: calc(50% - 50vw);
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .parallax-section .content {
        position: relative;
        z-index: 2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .parallax-section h1 {
        font-weight: 600;
        font-size: 3.5rem;
    }

    .parallax-section p {
        font-size: 1.25rem;
    }

    .parallax-section .btn {
        font-size: 1.25rem;
        padding: 0.75rem 1.5rem;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-primary {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    .custom-btn {
        position: relative;
        overflow: hidden;
        transition: color 0.4s;
    }

    .custom-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background: rgba(255, 255, 255, 0.15);
        transition: all 0.75s;
        border-radius: 50%;
        z-index: 1;
        transform: translate(-50%, -50%) scale(0);
    }

    .custom-btn:hover::before {
        transform: translate(-50%, -50%) scale(1);
    }

    .custom-btn:hover {
        color: #fff;
    }

    .custom-btn span {
        position: relative;
        z-index: 2;
    }
</style>
@endsection 