@extends('layouts.app')

@section('title', 'Manage Courses')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('admin.courses') }}">
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
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Manage Courses</h1>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <i class="bi bi-plus-circle"></i> Add New Course
                </button>
            </div>

            <!-- Filters -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search courses...">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>All Categories</option>
                        <option>Sales & Customer Experience</option>
                        <option>Digital Marketing</option>
                        <option>Technology & AI</option>
                        <option>Leadership & Soft Skills</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Upcoming</option>
                        <option>Completed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100">Filter</button>
                </div>
            </div>

            <!-- Course Table -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Trainer</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $courses = [
                                        (object)[
                                            'id' => 1,
                                            'title' => 'Rahsia Qwen AI untuk Usahawan',
                                            'category' => 'Technology & AI',
                                            'trainer' => 'Coach TAF',
                                            'date' => '3 July 2026',
                                            'price' => 99,
                                            'status' => 'Upcoming'
                                        ],
                                        (object)[
                                            'id' => 2,
                                            'title' => 'Setup TikTok Live Studio',
                                            'category' => 'Digital Marketing',
                                            'trainer' => 'Coach TAF',
                                            'date' => '2 July 2026',
                                            'price' => 149,
                                            'status' => 'Active'
                                        ],
                                        (object)[
                                            'id' => 3,
                                            'title' => 'Digital Marketing Masterclass',
                                            'category' => 'Digital Marketing',
                                            'trainer' => 'Sarah Lim',
                                            'date' => '15 June 2026',
                                            'price' => 199,
                                            'status' => 'Completed'
                                        ]
                                    ];
                                @endphp

                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td><strong>{{ $course->title }}</strong></td>
                                        <td>{{ $course->category }}</td>
                                        <td>{{ $course->trainer }}</td>
                                        <td>{{ $course->date }}</td>
                                        <td>RM {{ $course->price }}</td>
                                        <td>
                                            @if($course->status == 'Active')
                                                <span class="badge bg-success">Active</span>
                                            @elseif($course->status == 'Upcoming')
                                                <span class="badge bg-warning">Upcoming</span>
                                            @else
                                                <span class="badge bg-secondary">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" title="View">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Course Title</label>
                        <input type="text" class="form-control" placeholder="Enter course title">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option>Select category</option>
                                <option>Sales & Customer Experience</option>
                                <option>Digital Marketing</option>
                                <option>Technology & AI</option>
                                <option>Leadership & Soft Skills</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Trainer</label>
                            <select class="form-select">
                                <option>Select trainer</option>
                                <option>Coach TAF</option>
                                <option>Sarah Lim</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Time</label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Price (RM)</label>
                            <input type="number" class="form-control" placeholder="0.00">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Platform</label>
                        <select class="form-select">
                            <option>ZOOM</option>
                            <option>Google Meet</option>
                            <option>In-Person</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Course</button>
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
