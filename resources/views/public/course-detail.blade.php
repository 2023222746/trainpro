@extends('layouts.app')

@section('title', 'Course Detail')

@section('content')
<div class="container py-5">
    @php
        // Dummy data for a specific course (ID from route)
        $course = (object)[
            'id' => 1,
            'title' => 'Rahsia Qwen AI untuk Usahawan',
            'category' => 'Technology & AI',
            'description' => 'Kenali Qwen AI dan kenapa ia powerful untuk usahawan. Belajar cara guna Qwen AI untuk hasilkan jawapan & content dengan betul. Contoh praktikal bagaimana Qwen AI bantu tingkatkan produktiviti bisnes anda.',
            'what_learn' => [
                'Apa Itu Qwen AI',
                'Cara Guna Qwen AI',
                'Guna Untuk Bisnes'
            ],
            'date' => '3 July 2026',
            'time' => '9PM',
            'platform' => 'ZOOM',
            'price' => 99,
            'trainer' => 'Coach TAF'
        ];
    @endphp
    <div class="row">
        <div class="col-lg-8">
            <h1>{{ $course->title }}</h1>
            <span class="course-category">{{ $course->category }}</span>
            <hr>
            <h4>What You Will Learn</h4>
            <ul>
                @foreach($course->what_learn as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            <p><strong>Trainer:</strong> {{ $course->trainer }}</p>
            <p><strong>Date:</strong> {{ $course->date }} at {{ $course->time }}</p>
            <p><strong>Platform:</strong> {{ $course->platform }}</p>
            <p><strong>Price:</strong> RM {{ $course->price }}</p>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5>Enrol Now</h5>
                    @auth
                        <a href="{{ route('participant.enrol', $course->id) }}" class="btn btn-success w-100">Enrol Now</a>
                    @else
                        <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to enrol.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
