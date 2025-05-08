@extends('layout')

@section('title', 'Team List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Team List</h2>
        <a href="{{ route('teams.create') }}" class="btn btn-primary">Add Team</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Team Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teams as $index => $team)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $team->name }}</td>
                    <td>
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No teams found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
