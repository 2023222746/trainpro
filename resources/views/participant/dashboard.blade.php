@extends('layouts.app')

@section('title', 'Participant Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('participant.dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('participant.my-courses') }}">
                            <i class="bi bi-book-fill"></i> My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses') }}">
                            <i class="bi bi-search"></i> Browse Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-fill"></i> Profile
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome back, {{ Auth::user()->name }}!</h1>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Enrolled Courses</h5>
                            <h2 class="display-4">3</h2>
                            <p class="card-text">Active enrollments</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Completed</h5>
                            <h2 class="display-4">1</h2>
                            <p class="card-text">Courses finished</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">In Progress</h5>
                            <h2 class="display-4">2</h2>
                            <p class="card-text">Pending completion</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Classes -->
            <div class="card">
                <div class="card-header">
                    <h5>Upcoming Classes</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Platform</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rahsia Qwen AI untuk Usahawan</td>
                                    <td>3 July 2026</td>
                                    <td>9:00 PM</td>
                                    <td>ZOOM</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                </tr>
                                <tr>
                                    <td>Setup TikTok Live Studio</td>
                                    <td>2 July 2026</td>
                                    <td>8:00 PM</td>
                                    <td>ZOOM</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Recent Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">✅ You enrolled in "Rahsia Qwen AI untuk Usahawan" - 1 day ago</li>
                        <li class="list-group-item">📖 You completed "Introduction to Digital Marketing" - 3 days ago</li>
                        <li class="list-group-item">💰 Payment confirmed for "Setup TikTok Live Studio" - 5 days ago</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .sidebar {
        min-height: 100vh;
    }
    .sidebar .nav-link {
        color: #333;
        padding: 10px 15px;
        border-radius: 5px;
    }
    .sidebar .nav-link:hover {
        background: #e9ecef;
    }
    .sidebar .nav-link.active {
        background: #0a2e4a;
        color: white;
    }
    .sidebar .nav-link i {
        margin-right: 10px;
    }
</style>
@endpush
