@extends('layouts.app')

@section('title', 'Attendance Management')

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
                        <a class="nav-link active text-white" href="{{ route('trainer.attendance') }}">
                            <i class="bi bi-check-circle"></i> Attendance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('trainer.grading') }}">
                            <i class="bi bi-star"></i> Grading
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Attendance Management</h1>
                <div>
                    <button class="btn btn-success">
                        <i class="bi bi-check-all"></i> Mark All Present
                    </button>
                    <button class="btn btn-secondary">
                        <i class="bi bi-download"></i> Export CSV
                    </button>
                </div>
            </div>

            <!-- Select Class -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Select Class</label>
                            <select class="form-select">
                                <option>Setup TikTok Live Studio - 2 July 2026</option>
                                <option>Rahsia Qwen AI - 3 July 2026</option>
                                <option>Digital Marketing Masterclass - 15 June 2026</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" value="2026-07-02">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">&nbsp;</label>
                            <button class="btn btn-primary d-block w-100">Load Attendance</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Table -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Class Roster - TikTok Live Studio</h5>
                        <span class="badge bg-primary align-self-center">45 Students</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Attendance Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $students = [
                                        (object)['id' => 1, 'name' => 'Ahmad Faisal', 'email' => 'ahmad@email.com', 'status' => 'Present'],
                                        (object)['id' => 2, 'name' => 'Sarah Lim', 'email' => 'sarah@email.com', 'status' => 'Absent'],
                                        (object)['id' => 3, 'name' => 'Mohd Razi', 'email' => 'razi@email.com', 'status' => 'Present'],
                                        (object)['id' => 4, 'name' => 'Nurul Huda', 'email' => 'nurul@email.com', 'status' => 'Present'],
                                        (object)['id' => 5, 'name' => 'Tan Wei Ming', 'email' => 'weiming@email.com', 'status' => 'Absent'],
                                    ];
                                @endphp

                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td><strong>{{ $student->name }}</strong></td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            <span class="badge bg-{{ $student->status == 'Present' ? 'success' : 'danger' }}">
                                                {{ $student->status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($student->status == 'Present')
                                                <button class="btn btn-sm btn-warning mark-absent">
                                                    Mark Absent
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-success mark-present">
                                                    Mark Present
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end mt-3">
                        <button class="btn btn-primary btn-lg">
                            <i class="bi bi-save"></i> Save Attendance
                        </button>
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
    document.querySelectorAll('.mark-present, .mark-absent').forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const statusCell = row.querySelector('td:nth-child(4)');
            if (this.classList.contains('mark-present')) {
                statusCell.innerHTML = '<span class="badge bg-success">Present</span>';
                this.className = 'btn btn-sm btn-warning mark-absent';
                this.textContent = 'Mark Absent';
            } else {
                statusCell.innerHTML = '<span class="badge bg-danger">Absent</span>';
                this.className = 'btn btn-sm btn-success mark-present';
                this.textContent = 'Mark Present';
            }
        });
    });
</script>
@endpush
