@extends('layouts.app')

@section('title', 'My Courses')

@section('content')
    <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom">
        <h2>My Courses</h2>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Course
        </a>
    </div>

    <form method="GET" action="{{ route('courses.index') }}" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by course name or code...">
        </div>
        <div class="col-md-4">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="all">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-outline-secondary w-100">Filter</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Instructor</th>
                            <th>Units</th>
                            <th>Grade Point</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr class="{{ $course->academic_status == 'at risk' ? 'at-risk-row' : ($course->academic_status == 'not graded' ? 'not-graded-row' : '') }}">
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->category }}</td>
                                <td>{{ $course->instructor }}</td>
                                <td>{{ $course->units }}</td>
                                <td>{{ $course->isNotGraded() ? '—' : number_format($course->grade_point, 2) }}</td>
                                <td>
                                    @if ($course->academic_status == 'passing')
                                        <span class="badge bg-success status-badge">Passing</span>
                                    @elseif ($course->academic_status == 'at risk')
                                        <span class="badge bg-danger status-badge">At Risk</span>
                                    @else
                                        <span class="badge bg-warning text-dark status-badge">Not Graded</span>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove {{ $course->name }} from your record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center text-muted py-4">No matching courses found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
