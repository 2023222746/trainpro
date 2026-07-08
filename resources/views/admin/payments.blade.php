@extends('layouts.app')

@section('title', 'Payment Management')

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
                        <a class="nav-link active text-white" href="{{ route('admin.payments') }}">
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
                <h1 class="h2">Payment Management</h1>
                <div>
                    <span class="badge bg-warning p-2">12 Pending</span>
                </div>
            </div>

            <!-- Payment Stats -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Total Payments</h6>
                            <h3>RM 15,240</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Pending</h6>
                            <h3 class="text-warning">12</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Confirmed</h6>
                            <h3 class="text-success">45</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Failed</h6>
                            <h3 class="text-danger">3</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Table -->
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Confirmed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Failed</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Participant</th>
                                    <th>Course</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $payments = [
                                        (object)[
                                            'id' => 'PAY-001',
                                            'participant' => 'Ahmad Faisal',
                                            'course' => 'Rahsia Qwen AI',
                                            'amount' => 99,
                                            'date' => '2026-07-01 14:30',
                                            'method' => 'Credit Card',
                                            'status' => 'Pending',
                                            'status_class' => 'warning'
                                        ],
                                        (object)[
                                            'id' => 'PAY-002',
                                            'participant' => 'Sarah Lim',
                                            'course' => 'TikTok Live Studio',
                                            'amount' => 149,
                                            'date' => '2026-06-30 10:15',
                                            'method' => 'E-Wallet',
                                            'status' => 'Confirmed',
                                            'status_class' => 'success'
                                        ],
                                        (object)[
                                            'id' => 'PAY-003',
                                            'participant' => 'Mohd Razi',
                                            'course' => 'Digital Marketing Masterclass',
                                            'amount' => 199,
                                            'date' => '2026-06-28 09:00',
                                            'method' => 'Online Banking',
                                            'status' => 'Failed',
                                            'status_class' => 'danger'
                                        ]
                                    ];
                                @endphp

                                @foreach($payments as $payment)
                                    <tr>
                                        <td><strong>{{ $payment->id }}</strong></td>
                                        <td>{{ $payment->participant }}</td>
                                        <td>{{ $payment->course }}</td>
                                        <td>RM {{ $payment->amount }}</td>
                                        <td>{{ $payment->date }}</td>
                                        <td>{{ $payment->method }}</td>
                                        <td>
                                            <span class="badge bg-{{ $payment->status_class }}">
                                                {{ $payment->status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($payment->status == 'Pending')
                                                <button class="btn btn-sm btn-success">Confirm</button>
                                                <button class="btn btn-sm btn-danger">Reject</button>
                                            @elseif($payment->status == 'Confirmed')
                                                <span class="text-success"><i class="bi bi-check-circle"></i> Done</span>
                                            @else
                                                <span class="text-danger"><i class="bi bi-x-circle"></i> Failed</span>
                                            @endif
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
