@extends('layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Team Members</h2>
        <a href="{{ route('team-members.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus me-1"></i> Add Member
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Designations</th>
                        <th>Expert In</th>
                        <th>Team</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teamMembers as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->designations }}</td>
                            <td>{{ $member->expert_in }}</td>
                            <td>{{ $member->team->name ?? '' }}</td>
                            <td class="text-end">
                                <a href="{{ route('team-members.edit', $member->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('team-members.destroy', $member->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No team members found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
