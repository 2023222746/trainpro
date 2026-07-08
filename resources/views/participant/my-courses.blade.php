@extends('layouts.app')

@section('title', 'My Courses')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('participant.dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('participant.my-courses') }}">
                            <i class="bi bi-book-fill"></i> My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses') }}">
                            <i class="bi bi-search"></i> Browse Courses
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">My Courses</h1>
            </div>

            <!-- Course List -->
            <div class="row">
                @php
                    $courses = [
                        (object)[
                            'id' => 1,
                            'title' => 'Rahsia Qwen AI untuk Usahawan',
                            'category' => 'Technology & AI',
                            'date' => '3 July 2026',
                            'time' => '9PM',
                            'platform' => 'ZOOM',
                            'status' => 'Confirmed',
                            'status_class' => 'success',
                            'progress' => 0,
                            'grade' => '-'
                        ],
                        (object)[
                            'id' => 2,
                            'title' => 'Setup TikTok Live Studio',
                            'category' => 'Digital Marketing',
                            'date' => '2 July 2026',
                            'time' => '8PM',
                            'platform' => 'ZOOM',
                            'status' => 'Pending Payment',
                            'status_class' => 'warning',
                            'progress' => 0,
                            'grade' => '-'
                        ],
                        (object)[
                            'id' => 3,
                            'title' => 'Introduction to Digital Marketing',
                            'category' => 'Digital Marketing',
                            'date' => '15 June 2026',
                            'time' => '8PM',
                            'platform' => 'ZOOM',
                            'status' => 'Completed',
                            'status_class' => 'info',
                            'progress' => 100,
                            'grade' => 'A'
                        ]
                    ];
                @endphp

                @foreach($courses as $course)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-{{ $course->status_class }}">{{ $course->status }}</span>
                                    <span class="badge bg-secondary">{{ $course->category }}</span>
                                </div>
                                <h5 class="card-title mt-2">{{ $course->title }}</h5>
                                <p class="card-text">
                                    <small><strong>Date:</strong> {{ $course->date }} at {{ $course->time }}</small><br>
                                    <small><strong>Platform:</strong> {{ $course->platform }}</small>
                                </p>
                                
                                @if($course->progress > 0)
                                    <div class="progress mb-2">
                                        <div class="progress-bar" style="width: {{ $course->progress }}%"></div>
                                    </div>
                                    <small>Progress: {{ $course->progress }}%</small>
                                @endif

                                @if($course->grade != '-')
                                    <p><strong>Grade:</strong> {{ $course->grade }}</p>
                                @endif

                                @if($course->status == 'Pending Payment')
                                    <a href="{{ route('participant.payment', $course->id) }}" class="btn btn-warning btn-sm">Pay Now</a>
                                @endif

                                @if($course->status == 'Confirmed')
                                    <button class="btn btn-primary btn-sm">View Details</button>
                                @endif

                                @if($course->status == 'Completed')
                                    <button class="btn btn-success btn-sm">View Certificate</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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
</style>
@endpush
