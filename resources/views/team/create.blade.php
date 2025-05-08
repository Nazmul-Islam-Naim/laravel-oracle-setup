@extends('layout')

@section('title', 'Create Team')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mb-4">Create New Team</h2>

            <form action="{{ route('teams.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Team Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}" 
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('teams.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
