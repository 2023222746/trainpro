@extends('layouts.app')

@section('title', 'Enrol in Course')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Enrol in Course</h4>
                </div>
                <div class="card-body">
                    @php
                        $course = (object)[
                            'id' => 1,
                            'title' => 'Rahsia Qwen AI untuk Usahawan',
                            'price' => 99,
                            'date' => '3 July 2026',
                            'time' => '9PM'
                        ];
                    @endphp

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Course Details</h5>
                            <p><strong>Course:</strong> {{ $course->title }}</p>
                            <p><strong>Date:</strong> {{ $course->date }} at {{ $course->time }}</p>
                            <p><strong>Price:</strong> RM {{ $course->price }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> You will be redirected to payment after confirming your enrolment.
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('participant.enrol.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the terms and conditions of enrolment
                            </label>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('courses') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Proceed to Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
