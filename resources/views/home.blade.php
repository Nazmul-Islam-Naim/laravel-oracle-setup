@extends('layout')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">Welcome to the Team Management System</h1>
        <p class="lead text-secondary">Effortlessly manage your teams and their members with ease and clarity.</p>
        <a href="{{ route('team-members.index') }}" class="btn btn-lg btn-outline-primary mt-3">
            <i class="fas fa-users"></i> View Team Members
        </a>
    </div>

    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-light">
                <div class="card-body">
                    <i class="fas fa-layer-group fa-3x text-primary mb-3"></i>
                    <h4 class="card-title">Create a Team</h4>
                    <p class="card-text">Organize your members by creating a new team.</p>
                    <a href="{{ route('teams.create') }}" class="btn btn-primary">Create Team</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-light">
                <div class="card-body">
                    <i class="fas fa-user-plus fa-3x text-success mb-3"></i>
                    <h4 class="card-title">Add Team Member</h4>
                    <p class="card-text">Easily add new members to your teams.</p>
                    <a href="{{ route('team-members.create') }}" class="btn btn-success">Add Member</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-light">
                <div class="card-body">
                    <i class="fas fa-users-cog fa-3x text-info mb-3"></i>
                    <h4 class="card-title">View All Teams</h4>
                    <p class="card-text">Browse and manage all existing teams.</p>
                    <a href="{{ route('teams.index') }}" class="btn btn-info text-white">View Teams</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
