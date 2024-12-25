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
    <a href="{{ route('admin.wisata.create') }}" class="btn btn-success mb-3">Add New Wisata</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisatas as $wisata)
                <tr>
                    <td>{{ $wisata->id }}</td>
                    <td>{{ $wisata->nama }}</td>
                    <td>{{ $wisata->deskripsi }}</td>
                    <td>
                        @if ($wisata->gambar)
                            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}" style="width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.wisata.edit', $wisata->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.wisata.destroy', $wisata->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection