@extends('layouts.app')

@section('title', 'About TrainPro')

@section('content')
    <div class="container py-5">
        <!-- Company Overview -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold">Who We Are</h1>
                <p class="lead text-muted">
                    We are a dedicated corporate training and consultancy firm, committed to supporting
                    individuals and businesses through practical and expert-led learning solutions.
                </p>
                <hr class="w-25 mx-auto">
            </div>
        </div>

        <!-- Philosophy -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold">Our Educational Philosophy</h2>
                <p class="text-muted">
                    We believe that <strong>people grow businesses</strong>. Our approach combines
                    hands-on learning, real-world application, and continuous improvement.
                    We enable digital transformation across Marketing, Sales, and Operations
                    – ensuring every participant gains actionable skills.
                </p>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle-fill text-primary"></i> Practical, not just theory</li>
                    <li><i class="bi bi-check-circle-fill text-primary"></i> Expert trainers with industry experience</li>
                    <li><i class="bi bi-check-circle-fill text-primary"></i> Tailored to your industry needs</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/philosophy.jpg') }}" alt="Our Philosophy" class="img-fluid rounded shadow">
            </div>
        </div>

        <!-- The Mind Behind The Success -->
        <div class="row align-items-center bg-light p-4 rounded shadow-sm mb-5">
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/coach-taf.jpg') }}" alt="Coach TAF" class="img-fluid rounded-circle" style="max-width: 200px;">
            </div>
            <div class="col-lg-8">
                <h2 class="fw-bold">Tuan Ahmad Fairus (Coach TAF)</h2>
                <h5 class="text-primary">Master Trainer & Business Consultant</h5>
                <p class="text-muted">
                    Over <strong>30,000 entrepreneurs trained</strong>. HRDCorp Certified Trainer | JPK TM002 Basic Training Methodology |
                    LRN Level 3 Diploma in Digital Entrepreneurship (UK) | Google Ads Certified | eUsahawan MDEC Trainer | INSKEN Trainer.
                </p>
                <p>
                    Founder of Mahakarya Studio, Principal for Hero Digital Academy, Co-Founder & Marketing Strategist for Rumah Kebaya Malaysia,
                    International Master Trainer at Argia Academy, Indonesia.
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-decoration-none"><i class="bi bi-linkedin"></i> LinkedIn</a>
                    <a href="#" class="text-decoration-none"><i class="bi bi-youtube"></i> YouTube</a>
                    <a href="#" class="text-decoration-none"><i class="bi bi-instagram"></i> Instagram</a>
                </div>
            </div>
        </div>

        <!-- Stats & Accreditation -->
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-award display-4 text-primary"></i>
                        <h5 class="mt-2">HRDCorp Certified</h5>
                        <p class="text-muted small">Maximise your levy grants</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-people display-4 text-primary"></i>
                        <h5 class="mt-2">30,000+ Trained</h5>
                        <p class="text-muted small">Across Malaysia & Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-globe2 display-4 text-primary"></i>
                        <h5 class="mt-2">International Reach</h5>
                        <p class="text-muted small">Cross-border impact</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-mortarboard display-4 text-primary"></i>
                        <h5 class="mt-2">Practical Learning</h5>
                        <p class="text-muted small">Hands-on, not just theory</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact CTA -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto text-center bg-primary text-white p-4 rounded">
                <h4>Empowering Business Growth Through Strategic Training Solutions</h4>
                <p>Connect with us to explore customised training and business development solutions tailored to your organisation’s needs.</p>
                <a href="mailto:trainingtrainpro@gmail.com" class="btn btn-warning text-dark">Email Us</a>
                <a href="tel:01156867175" class="btn btn-outline-light ms-2">Call Now</a>
            </div>
        </div>
    </div>
@endsection
