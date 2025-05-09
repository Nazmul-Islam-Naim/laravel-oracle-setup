@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-user-edit me-2"></i> Edit Team Member
                    </h5>
                    <a href="{{ route('team-members.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('team-members.update', $teamMember->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $teamMember->name }}" required placeholder="Enter full name">
                        </div>

                        <div class="mb-3">
                            <label for="designations" class="form-label fw-semibold">Designations</label>
                            <input type="text" id="designations" name="designations" class="form-control" value="{{ $teamMember->designations }}" placeholder="e.g., Lead Designer">
                        </div>

                        <div class="mb-3">
                            <label for="expert_in" class="form-label fw-semibold">Expert In</label>
                            <input type="text" id="expert_in" name="expert_in" class="form-control" value="{{ $teamMember->expert_in }}" placeholder="e.g., Figma, UI/UX">
                        </div>

                        <div class="mb-4">
                            <label for="team_id" class="form-label fw-semibold">Team <span class="text-danger">*</span></label>
                            <select id="team_id" name="team_id" class="form-select" required>
                                <option value="">-- Select Team --</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" @if($team->id == $teamMember->team_id) selected @endif>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-1"></i> Update Member
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
