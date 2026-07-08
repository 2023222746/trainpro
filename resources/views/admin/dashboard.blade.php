@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.courses') }}">
                            <i class="bi bi-book-fill"></i> Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.payments') }}">
                            <i class="bi bi-credit-card"></i> Payments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.users') }}">
                            <i class="bi bi-people-fill"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="bi bi-gear-fill"></i> Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle"></i> New Course
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h6 class="card-title">Total Enrollments</h6>
                            <h2 class="display-5">156</h2>
                            <small>+12% from last month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h6 class="card-title">Revenue</h6>
                            <h2 class="display-5">RM 15,240</h2>
                            <small>+8.5% from last month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h6 class="card-title">Pending Payments</h6>
                            <h2 class="display-5">12</h2>
                            <small>Need confirmation</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h6 class="card-title">Active Courses</h6>
                            <h2 class="display-5">8</h2>
                            <small>Currently running</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Payments -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Recent Payments</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Participant</th>
                                    <th>Course</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ahmad Faisal</td>
                                    <td>Rahsia Qwen AI</td>
                                    <td>RM 99</td>
                                    <td>2026-07-01</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-success">Confirm</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sarah Lim</td>
                                    <td>TikTok Live Studio</td>
                                    <td>RM 149</td>
                                    <td>2026-06-30</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                    <td>
                                        <span class="text-success"><i class="bi bi-check-circle"></i> Done</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Upcoming Courses -->
            <div class="card">
                <div class="card-header">
                    <h5>Upcoming Courses</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Trainer</th>
                                    <th>Date</th>
                                    <th>Participants</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Setup TikTok Live Studio</td>
                                    <td>Coach TAF</td>
                                    <td>2 July 2026</td>
                                    <td>45</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Rahsia Qwen AI</td>
                                    <td>Coach TAF</td>
                                    <td>3 July 2026</td>
                                    <td>38</td>
                                    <td><span class="badge bg-warning">Upcoming</span></td>
                                </tr>
                            </tbody>
                        </table>
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
    .sidebar .nav-link i {
        margin-right: 10px;
    }
</style>
@endpush
