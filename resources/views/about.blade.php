@extends('layout')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-dark">About the Team Management System</h1>
        <p class="lead text-muted">Simplifying team organization for modern workflows.</p>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('images/teamwork.png') }}" alt="Teamwork illustration" class="img-fluid" style="max-height: 350px; object-fit: contain;">
        </div>
        <div class="col-md-6">
            <h3 class="text-primary">Why We Built This</h3>
            <p class="text-muted">
                Managing teams shouldn’t be a hassle. Our system was created to streamline the process of organizing team structures, tracking members, and improving collaboration.
                Whether you're running a small project or a large organization, our goal is to empower teams to perform at their best.
            </p>
        </div>
    </div>

    <div class="row text-center g-4">
        <div class="col-md-4">
            <i class="fas fa-bolt fa-3x text-warning mb-3"></i>
            <h5 class="fw-bold">Fast & Efficient</h5>
            <p class="text-muted">Quickly create teams, add members, and access data in seconds.</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-shield-alt fa-3x text-danger mb-3"></i>
            <h5 class="fw-bold">Secure</h5>
            <p class="text-muted">Built with best practices to ensure your team’s data remains protected.</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-laptop-code fa-3x text-success mb-3"></i>
            <h5 class="fw-bold">Developer Friendly</h5>
            <p class="text-muted">Built with Laravel and Bootstrap for a seamless developer experience.</p>
        </div>
    </div>

    <div class="mt-5 text-center">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>
</div>
@endsection
