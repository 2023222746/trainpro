@extends('layouts.app')

@section('title', 'Trainer Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('trainer.dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('trainer.attendance') }}">
                            <i class="bi bi-check-circle"></i> Attendance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('trainer.grading') }}">
                            <i class="bi bi-star"></i> Grading
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="bi bi-calendar"></i> Schedule
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
                            <h6 class="card-title">My Classes</h6>
                            <h2 class="display-4">4</h2>
                            <small>Active classes</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h6 class="card-title">Total Students</h6>
                            <h2 class="display-4">156</h2>
                            <small>Across all classes</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h6 class="card-title">Pending Attendance</h6>
                            <h2 class="display-4">3</h2>
                            <small>Need to mark</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Classes -->
            <div class="card">
                <div class="card-header">
                    <h5>My Classes</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Students</th>
                                    <th>Attendance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Setup TikTok Live Studio</td>
                                    <td>2 July 2026</td>
                                    <td>8:00 PM</td>
                                    <td>45</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <a href="{{ route('trainer.attendance') }}" class="btn btn-sm btn-primary">
                                            Mark Attendance
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rahsia Qwen AI untuk Usahawan</td>
                                    <td>3 July 2026</td>
                                    <td>9:00 PM</td>
                                    <td>38</td>
                                    <td><span class="badge bg-secondary">Upcoming</span></td>
                                    <td>
                                        <span class="text-muted">Not started</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Digital Marketing Masterclass</td>
                                    <td>15 June 2026</td>
                                    <td>8:00 PM</td>
                                    <td>52</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <a href="{{ route('trainer.grading') }}" class="btn btn-sm btn-success">
                                            View Grades
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-check display-4 text-primary"></i>
                            <h5 class="mt-2">Upcoming Schedule</h5>
                            <p class="text-muted">Next class: TikTok Live Studio - 2 July 2026</p>
                            <button class="btn btn-outline-primary">View Full Schedule</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-file-earmark-text display-4 text-success"></i>
                            <h5 class="mt-2">Materials & Resources</h5>
                            <p class="text-muted">Upload and manage your course materials</p>
                            <button class="btn btn-outline-success">Manage Resources</button>
                        </div>
                    </div>
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
        padding: 10px 15px;
        border-radius: 5px;
    }
    .sidebar .nav-link:hover {
        background: rgba(255,255,255,0.1);
    }
    .sidebar .nav-link.active {
        background: #0a2e4a;
    }
    .sidebar .nav-link i {
        margin-right: 10px;
    }
</style>
@endpush
