@extends('layouts.app')

@section('title', 'Manage Wisata')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Wisata</li>
        </ol>
    </nav>
    <h1 class="text-center mb-4">Manage Wisata</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.wisata.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Wisata</a>
        @if (session('success'))
            <div class="alert alert-success mb-0">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Jam Operasional</th>
                    <th>Harga Tiket</th>
                    <th>Fasilitas</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisatas as $wisata)
                <tr>
                    <td>{{ $wisata->id }}</td>
                    <td>{{ $wisata->nama }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 50) }}</td>
                    <td>
                        @if ($wisata->gambar)
                            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}" class="img-thumbnail" style="width: 100px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $wisata->jam_operasional }}</td>
                    <td>{{ $wisata->harga_tiket }}</td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach (explode("\n", $wisata->fasilitas) as $fasilitas)
                                <li>{{ $fasilitas }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.wisata.edit', $wisata->id) }}" class="btn btn-warning btn-sm me-2"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.wisata.destroy', $wisata->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection