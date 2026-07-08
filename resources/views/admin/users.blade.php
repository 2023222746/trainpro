@extends('layouts.app')

@section('title', 'User Management')

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
                        <a class="nav-link active text-white" href="{{ route('admin.users') }}">
                            <i class="bi bi-people-fill"></i> Users
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">User Management</h1>
                <button class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Add User
                </button>
            </div>

            <!-- User Stats -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Total Users</h6>
                            <h3>128</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Participants</h6>
                            <h3>112</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Trainers</h6>
                            <h3>8</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Admins</h6>
                            <h3>3</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Table -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $users = [
                                        (object)[
                                            'id' => 1,
                                            'name' => 'Coach TAF',
                                            'email' => 'coachtaf@trainpro.com',
                                            'role' => 'Trainer',
                                            'joined' => '2026-01-15',
                                            'status' => 'Active'
                                        ],
                                        (object)[
                                            'id' => 2,
                                            'name' => 'Ahmad Faisal',
                                            'email' => 'ahmad@email.com',
                                            'role' => 'Participant',
                                            'joined' => '2026-06-20',
                                            'status' => 'Active'
                                        ],
                                        (object)[
                                            'id' => 3,
                                            'name' => 'Sarah Lim',
                                            'email' => 'sarah@email.com',
                                            'role' => 'Participant',
                                            'joined' => '2026-06-25',
                                            'status' => 'Active'
                                        ],
                                        (object)[
                                            'id' => 4,
                                            'name' => 'Admin User',
                                            'email' => 'admin@trainpro.com',
                                            'role' => 'Admin',
                                            'joined' => '2026-01-01',
                                            'status' => 'Active'
                                        ]
                                    ];
                                @endphp

                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><strong>{{ $user->name }}</strong></td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->role == 'Admin')
                                                <span class="badge bg-danger">{{ $user->role }}</span>
                                            @elseif($user->role == 'Trainer')
                                                <span class="badge bg-primary">{{ $user->role }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $user->role }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->joined }}</td>
                                        <td>
                                            <span class="badge bg-success">{{ $user->status }}</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" title="Edit">
                                                <i class="bi bi-pencil"></i>
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
