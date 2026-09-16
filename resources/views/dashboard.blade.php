@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap align-items-center pb-2 mb-3 border-bottom">
        <h2>Good day, {{ auth()->user()->name }}!</h2>
        <span class="small text-muted">{{ now()->format('F j, Y g:i A') }}</span>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card stat-card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Total Courses</h5>
                    <h2 class="card-text fw-bold text-primary">{{ $totalCourses }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stat-card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Total Units</h5>
                    <h2 class="card-text fw-bold text-success">{{ $totalUnits }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stat-card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Current GPA</h5>
                    <h2 class="card-text fw-bold text-info">{{ number_format($gpa, 2) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stat-card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Courses At Risk</h5>
                    <h2 class="card-text fw-bold text-danger">{{ $atRiskCount }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header card-header-custom">Recently Added Courses</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr><th>Course</th><th>Category</th><th>Units</th><th>Added</th></tr>
                        </thead>
                        <tbody>
                            @forelse ($recentCourses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->category }}</td>
                                    <td>{{ $course->units }}</td>
                                    <td>{{ $course->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted py-3">No courses yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header card-header-custom">Academic Alerts</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr><th>Course</th><th>Grade</th><th>Required</th></tr>
                        </thead>
                        <tbody>
                            @forelse ($atRiskCourses as $course)
                                <tr class="{{ $course->isNotGraded() ? 'not-graded-row' : 'at-risk-row' }}">
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->isNotGraded() ? '—' : number_format($course->grade_point, 2) }}</td>
                                    <td>{{ number_format($course->minimum_grade, 2) }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center text-muted py-3">All courses are passing. Great work!</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header card-header-custom">Performance by Category</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr><th>Category</th><th>Courses</th><th>Total Units</th><th>Average Grade</th></tr>
                </thead>
                <tbody>
                    @foreach ($categorySummary as $summary)
                        <tr>
                            <td>{{ $summary->category }}</td>
                            <td>{{ $summary->total_courses }}</td>
                            <td>{{ $summary->total_units }}</td>
                            <td>{{ number_format($summary->average_grade, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
