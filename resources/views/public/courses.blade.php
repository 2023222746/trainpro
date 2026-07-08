@extends('layouts.app')

@section('title', 'All Courses')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Our Courses</h1>
            <p class="lead text-muted">Choose from a wide range of programmes designed to upskill you and your team.</p>
        </div>

        <!-- Search & Filters -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search courses...">
                    <button class="btn btn-outline-secondary" type="button" id="searchBtn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                    <button class="btn btn-outline-primary category-filter active" data-category="all">All</button>
                    <button class="btn btn-outline-secondary category-filter" data-category="Sales & Customer Experience">Sales & CS</button>
                    <button class="btn btn-outline-secondary category-filter" data-category="Digital Marketing">Digital Marketing</button>
                    <button class="btn btn-outline-secondary category-filter" data-category="Technology & AI">Tech & AI</button>
                    <button class="btn btn-outline-secondary category-filter" data-category="Leadership & Soft Skills">Leadership</button>
                    <button class="btn btn-outline-secondary category-filter" data-category="Team Building">Team Building</button>
                    <button class="btn btn-outline-secondary category-filter" data-category="Tourism">Tourism</button>
                </div>
            </div>
        </div>

        <!-- Course Grid -->
        <div class="row" id="courseGrid">
            @php
                $allCourses = [
                    (object)[
                        'id' => 1,
                        'title' => 'Rahsia Qwen AI untuk Usahawan',
                        'category' => 'Technology & AI',
                        'description' => 'Kenali Qwen AI dan kenapa ia powerful untuk usahawan. Belajar cara guna Qwen AI untuk hasilkan jawapan & content dengan betul.',
                        'date' => '3 July 2026',
                        'time' => '9PM',
                        'platform' => 'ZOOM',
                        'price' => 99,
                        'image' => 'qwen.jpg'
                    ],
                    (object)[
                        'id' => 2,
                        'title' => 'Setup TikTok Live Studio',
                        'category' => 'Digital Marketing',
                        'description' => 'Install, setting dan kenali antara muka Live Studio. Belajar cipta scene profesional, overlay produk, dan tips tersembunyi.',
                        'date' => '2 July 2026',
                        'time' => '8PM',
                        'platform' => 'ZOOM',
                        'price' => 149,
                        'image' => 'tiktok.jpg'
                    ],
                    (object)[
                        'id' => 3,
                        'title' => 'Mastering Sales Funnel for SMEs',
                        'category' => 'Sales & Customer Experience',
                        'description' => 'Build and optimise sales funnels to convert leads into loyal customers.',
                        'date' => '10 July 2026',
                        'time' => '7PM',
                        'platform' => 'ZOOM',
                        'price' => 199,
                        'image' => 'sales-funnel.jpg'
                    ],
                    (object)[
                        'id' => 4,
                        'title' => 'Leadership & Emotional Intelligence',
                        'category' => 'Leadership & Soft Skills',
                        'description' => 'Develop leadership presence and emotional intelligence to inspire your team.',
                        'date' => '17 July 2026',
                        'time' => '8PM',
                        'platform' => 'ZOOM',
                        'price' => 249,
                        'image' => 'leadership.jpg'
                    ],
                    (object)[
                        'id' => 5,
                        'title' => 'Tourism Hospitality Course Program',
                        'category' => 'Tourism',
                        'description' => 'Comprehensive training for tourism and hospitality professionals.',
                        'date' => '24 July 2026',
                        'time' => '10AM',
                        'platform' => 'In-Person',
                        'price' => 399,
                        'image' => 'tourism.jpg'
                    ],
                    (object)[
                        'id' => 6,
                        'title' => 'Team Building & Communication',
                        'category' => 'Team Building',
                        'description' => 'Strengthen team collaboration and communication through interactive activities.',
                        'date' => '31 July 2026',
                        'time' => '9AM',
                        'platform' => 'In-Person',
                        'price' => 299,
                        'image' => 'team-building.jpg'
                    ]
                ];
            @endphp

            @foreach($allCourses as $course)
                <div class="col-md-6 col-lg-4 mb-4 course-card" 
                     data-category="{{ $course->category }}" 
                     data-title="{{ strtolower($course->title) }}">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}" style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-warning text-dark mb-2">{{ $course->category }}</span>
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text small text-muted">{{ Str::limit($course->description, 80) }}</p>
                            <ul class="list-unstyled small">
                                <li><i class="bi bi-calendar-event"></i> {{ $course->date }} at {{ $course->time }}</li>
                                <li><i class="bi bi-laptop"></i> {{ $course->platform }}</li>
                                <li><i class="bi bi-tag"></i> RM {{ $course->price }}</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('course.detail', $course->id) }}" class="btn btn-outline-primary w-100">
                                Learn More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- No results message -->
        <div id="noResults" class="text-center py-5 d-none">
            <i class="bi bi-exclamation-circle display-4 text-muted"></i>
            <h4 class="mt-3">No courses found</h4>
            <p class="text-muted">Try adjusting your search or filter.</p>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    (function() {
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        const filterBtns = document.querySelectorAll('.category-filter');
        const courseCards = document.querySelectorAll('.course-card');
        const noResults = document.getElementById('noResults');

        function filterCourses() {
            let activeCategory = 'all';
            filterBtns.forEach(btn => {
                if (btn.classList.contains('active')) {
                    activeCategory = btn.dataset.category;
                }
            });

            const searchTerm = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            courseCards.forEach(card => {
                const cardCategory = card.dataset.category;
                const cardTitle = card.dataset.title;
                const matchesCategory = (activeCategory === 'all' || cardCategory === activeCategory);
                const matchesSearch = cardTitle.includes(searchTerm);
                if (matchesCategory && matchesSearch) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                noResults.classList.remove('d-none');
            } else {
                noResults.classList.add('d-none');
            }
        }

        // Filter button clicks
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                filterBtns.forEach(b => b.classList.remove('active', 'btn-primary'));
                filterBtns.forEach(b => b.classList.add('btn-outline-secondary'));
                this.classList.remove('btn-outline-secondary');
                this.classList.add('active', 'btn-primary');
                filterCourses();
            });
        });

        // Search on input
        searchInput.addEventListener('keyup', function() {
            filterCourses();
        });
        searchBtn.addEventListener('click', function() {
            filterCourses();
        });

        // Initial show all
        filterCourses();
    })();
</script>
@endpush

@push('styles')
<style>
    .category-filter.active {
        background-color: #0a2e4a;
        color: white;
        border-color: #0a2e4a;
    }
    .course-card .card:hover {
        transform: translateY(-5px);
        transition: 0.2s;
    }
</style>
@endpush
