@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
        </ol>
    </nav>
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    
    <!-- Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Wisata</h5>
                    <p class="card-text display-4">{{ $totalWisata }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Kuliner</h5>
                    <p class="card-text display-4">{{ $totalKuliner }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class=s"card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-4">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">User Activity</h5>
                    <canvas id="userActivityChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Sections -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Wisata</h5>
                    <p class="card-text">Add, edit, and delete wisata entries.</p>
                    <a href="{{ route('admin.wisata.index') }}" class="btn btn-primary">Go to Wisata</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Kuliner</h5>
                    <p class="card-text">Add, edit, and delete kuliner entries.</p>
                    <a href="{{ route('admin.kuliner.index') }}" class="btn btn-primary">Go to Kuliner</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('userActivityChart').getContext('2d');
    var userActivityChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($activityLabels),
            datasets: [{
                label: 'User Activity',
                data: @json($activityData),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection