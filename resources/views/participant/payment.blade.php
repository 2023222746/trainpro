@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Complete Payment</h4>
                </div>
                <div class="card-body">
                    @php
                        $enrolment = (object)[
                            'id' => 1,
                            'course' => (object)[
                                'title' => 'Rahsia Qwen AI untuk Usahawan'
                            ],
                            'amount' => 99,
                            'reference' => 'TRP-2026-001'
                        ];
                    @endphp

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Payment Summary</h5>
                            <p><strong>Course:</strong> {{ $enrolment->course->title }}</p>
                            <p><strong>Amount:</strong> RM {{ $enrolment->amount }}</p>
                            <p><strong>Reference:</strong> {{ $enrolment->reference }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i> 
                                <strong>Mock Payment Mode</strong><br>
                                This is a demonstration. Click "Pay Now" to simulate successful payment.
                            </div>
                        </div>
                    </div>

                    <div class="payment-methods mb-4">
                        <h6>Select Payment Method</h6>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="card payment-option">
                                    <div class="card-body text-center">
                                        <i class="bi bi-credit-card" style="font-size: 2rem;"></i>
                                        <p class="mb-0">Credit/Debit Card</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card payment-option">
                                    <div class="card-body text-center">
                                        <i class="bi bi-wallet" style="font-size: 2rem;"></i>
                                        <p class="mb-0">E-Wallet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card payment-option">
                                    <div class="card-body text-center">
                                        <i class="bi bi-building" style="font-size: 2rem;"></i>
                                        <p class="mb-0">Online Banking</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('participant.payment.confirm') }}" method="POST">
                        @csrf
                        <input type="hidden" name="enrolment_id" value="{{ $enrolment->id }}">
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="payment_terms" required>
                            <label class="form-check-label" for="payment_terms">
                                I confirm that the payment details are correct
                            </label>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('participant.my-courses') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-credit-card"></i> Pay Now (Mock)
                            </button>
                        </div>
                    </form>

                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="bi bi-lock"></i> Your payment is secure. This is a demonstration environment.
                            <br>Powered by <strong>Fiuu</strong> (Mock Integration)
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .payment-option {
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid #dee2e6;
    }
    .payment-option:hover {
        border-color: #0a2e4a;
        background: #f8f9fa;
    }
    .payment-option .card-body i {
        color: #0a2e4a;
    }
</style>
@endpush

@push('scripts')
<script>
    // Add click functionality to payment options
    document.querySelectorAll('.payment-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.payment-option').forEach(opt => {
                opt.style.borderColor = '#dee2e6';
            });
            this.style.borderColor = '#28a745';
        });
    });
</script>
@endpush
