@extends('layouts.app')

@section('title', 'Owner Dashboard - Analytics & Reports')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('owner.dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Analytics
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="bi bi-file-earmark-bar-graph"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="bi bi-people"></i> All Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="bi bi-gear"></i> Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Business Analytics Dashboard</h1>
                <div>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-calendar"></i> Last 30 Days
                    </button>
                    <button class="btn btn-primary">
                        <i class="bi bi-file-pdf"></i> Export Report
                    </button>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h6>Total Revenue</h6>
                            <h2 class="display-5">RM 215,840</h2>
                            <small><i class="bi bi-arrow-up"></i> +15.3% from last month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h6>Total Participants</h6>
                            <h2 class="display-5">1,247</h2>
                            <small><i class="bi bi-arrow-up"></i> +22% from last month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h6>Courses Offered</h6>
                            <h2 class="display-5">28</h2>
                            <small><i class="bi bi-arrow-up"></i> +5 new this month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h6>Avg. Course Rating</h6>
                            <h2 class="display-5">4.8</h2>
                            <small><i class="bi bi-star-fill"></i> ★★★★★ (based on 342 reviews)</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Revenue Overview</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Popular Categories</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="categoryChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Top Performing Courses</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Course</th>
                                            <th>Enrollments</th>
                                            <th>Revenue</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Setup TikTok Live Studio</td>
                                            <td>156</td>
                                            <td>RM 23,244</td>
                                            <td>4.9 ★</td>
                                        </tr>
                                        <tr>
                                            <td>Rahsia Qwen AI</td>
                                            <td>128</td>
                                            <td>RM 12,672</td>
                                            <td>4.8 ★</td>
                                        </tr>
                                        <tr>
                                            <td>Digital Marketing Masterclass</td>
                                            <td>98</td>
                                            <td>RM 19,502</td>
                                            <td>4.7 ★</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Recent Enrollments</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Ahmad Faisal</h6>
                                        <small>1 hour ago</small>
                                    </div>
                                    <p class="mb-1">Enrolled in "Rahsia Qwen AI"</p>
                                    <small class="text-success">Payment confirmed</small>
                                </div>
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Sarah Lim</h6>
                                        <small>3 hours ago</small>
                                    </div>
                                    <p class="mb-1">Enrolled in "Setup TikTok Live Studio"</p>
                                    <small class="text-warning">Payment pending</small>
                                </div>
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Mohd Razi</h6>
                                        <small>5 hours ago</small>
                                    </div>
                                    <p class="mb-1">Enrolled in "Leadership Masterclass"</p>
                                    <small class="text-success">Payment confirmed</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Export Options -->
            <div class="card">
                <div class="card-body">
                    <h5>Export Reports</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-outline-primary w-100">
                                <i class="bi bi-file-pdf"></i> Financial Report
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-success w-100">
                                <i class="bi bi-file-excel"></i> Enrollment Report
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-warning w-100">
                                <i class="bi bi-file-text"></i> Trainer Performance
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-secondary w-100">
                                <i class="bi bi-file-spreadsheet"></i> Custom Report
                            </button>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Revenue (RM)',
                data: [12000, 15000, 18000, 22000, 28000, 35000, 42000],
                borderColor: '#0a2e4a',
                backgroundColor: 'rgba(10, 46, 74, 0.1)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Digital Marketing', 'Technology & AI', 'Sales & CS', 'Leadership'],
            datasets: [{
                data: [35, 25, 20, 20],
                backgroundColor: ['#0a2e4a', '#f5a623', '#28a745', '#17a2b8']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush
