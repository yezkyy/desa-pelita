@extends('layouts.app')

@section('title', 'Manage Kuliner')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Manage Kuliner</h1>
    <a href="{{ route('admin.kuliner.create') }}" class="btn btn-success mb-3">Add New Kuliner</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kuliners as $kuliner)
                <tr>
                    <td>{{ $kuliner->id }}</td>
                    <td>{{ $kuliner->name }}</td>
                    <td>{{ $kuliner->description }}</td>
                    <td><img src="{{ asset('storage/' . $kuliner->image) }}" alt="{{ $kuliner->name }}" style="width: 100px;"></td>
                    <td>
                        <a href="{{ route('admin.kuliner.edit', $kuliner->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.kuliner.destroy', $kuliner->id) }}" method="POST" style="display:inline;">
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