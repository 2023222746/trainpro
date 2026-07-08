@extends('layouts.app')

@section('title', 'Student Grading')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('trainer.dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('trainer.attendance') }}">
                            <i class="bi bi-check-circle"></i> Attendance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('trainer.grading') }}">
                            <i class="bi bi-star"></i> Grading
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Student Grading</h1>
                <button class="btn btn-secondary">
                    <i class="bi bi-download"></i> Export Grades
                </button>
            </div>

            <!-- Select Class -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Select Class</label>
                            <select class="form-select">
                                <option>Setup TikTok Live Studio - 2 July 2026</option>
                                <option>Rahsia Qwen AI - 3 July 2026</option>
                                <option>Digital Marketing Masterclass - 15 June 2026</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">&nbsp;</label>
                            <button class="btn btn-primary d-block w-100">Load Students</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grading Table -->
            <div class="card">
                <div class="card-header">
                    <h5>Grades - Digital Marketing Masterclass</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Attendance</th>
                                    <th>Assignment</th>
                                    <th>Quiz</th>
                                    <th>Final Grade</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $students = [
                                        (object)['id' => 1, 'name' => 'Ahmad Faisal', 'attendance' => 90, 'assignment' => 85, 'quiz' => 88, 'grade' => 'A', 'status' => 'Completed'],
                                        (object)['id' => 2, 'name' => 'Sarah Lim', 'attendance' => 75, 'assignment' => 70, 'quiz' => 65, 'grade' => 'B+', 'status' => 'Completed'],
                                        (object)['id' => 3, 'name' => 'Mohd Razi', 'attendance' => 95, 'assignment' => 92, 'quiz' => 94, 'grade' => 'A', 'status' => 'Completed'],
                                        (object)['id' => 4, 'name' => 'Nurul Huda', 'attendance' => 60, 'assignment' => 55, 'quiz' => 50, 'grade' => 'C', 'status' => 'Pending'],
                                        (object)['id' => 5, 'name' => 'Tan Wei Ming', 'attendance' => 80, 'assignment' => 78, 'quiz' => 82, 'grade' => 'B', 'status' => 'Completed'],
                                    ];
                                @endphp

                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td><strong>{{ $student->name }}</strong></td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" 
                                                   value="{{ $student->attendance }}" style="width: 70px;" min="0" max="100">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" 
                                                   value="{{ $student->assignment }}" style="width: 70px;" min="0" max="100">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" 
                                                   value="{{ $student->quiz }}" style="width: 70px;" min="0" max="100">
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $student->grade == 'A' ? 'success' : ($student->grade == 'A' ? 'primary' : 'warning') }}">
                                                {{ $student->grade }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $student->status == 'Completed' ? 'success' : 'warning' }}">
                                                {{ $student->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Update</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-3">
                        <button class="btn btn-success btn-lg">
                            <i class="bi bi-save"></i> Save All Grades
                        </button>
                    </div>
                </div>
            </div>

            <!-- Grade Distribution -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Grade Distribution</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-2">
                            <h3 class="text-success">A</h3>
                            <p>12 students</p>
                        </div>
                        <div class="col-md-2">
                            <h3 class="text-primary">B</h3>
                            <p>15 students</p>
                        </div>
                        <div class="col-md-2">
                            <h3 class="text-warning">C</h3>
                            <p>8 students</p>
                        </div>
                        <div class="col-md-2">
                            <h3 class="text-danger">D</h3>
                            <p>3 students</p>
                        </div>
                        <div class="col-md-2">
                            <h3 class="text-secondary">F</h3>
                            <p>2 students</p>
                        </div>
                        <div class="col-md-2">
                            <h3 class="text-muted">Pending</h3>
                            <p>5 students</p>
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
<script>
    // Auto-calculate grade based on inputs
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('change', function() {
            const row = this.closest('tr');
            const inputs = row.querySelectorAll('input[type="number"]');
            const total = Array.from(inputs).reduce((sum, inp) => sum + parseInt(inp.value || 0), 0);
            const average = total / inputs.length;
            
            const gradeCell = row.querySelector('td:nth-child(6)');
            let grade = '';
            if (average >= 90) grade = 'A';
            else if (average >= 80) grade = 'B';
            else if (average >= 70) grade = 'C';
            else if (average >= 60) grade = 'D';
            else grade = 'F';
            
            gradeCell.innerHTML = `<span class="badge bg-${grade == 'A' ? 'success' : (grade == 'B
