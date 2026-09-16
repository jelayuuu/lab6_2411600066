@extends('layouts.app')

@section('title', $course->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom">
        <h2>{{ $course->name }}</h2>
        <div>
            <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this course?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6"><strong>Course Code:</strong> {{ $course->code }}</div>
                <div class="col-md-6"><strong>Category:</strong> {{ $course->category }}</div>
                <div class="col-md-6"><strong>Instructor:</strong> {{ $course->instructor ?? '—' }}</div>
                <div class="col-md-6">
                    <strong>Status:</strong>
                    @if ($course->academic_status == 'passing')
                        <span class="badge bg-success">Passing</span>
                    @elseif ($course->academic_status == 'at risk')
                        <span class="badge bg-danger">At Risk</span>
                    @else
                        <span class="badge bg-warning text-dark">Not Graded</span>
                    @endif
                </div>
                <div class="col-md-4"><strong>Units:</strong> {{ $course->units }}</div>
                <div class="col-md-4"><strong>Passing Grade:</strong> {{ number_format($course->minimum_grade, 2) }}</div>
                <div class="col-md-4"><strong>Grade Point:</strong> {{ $course->isNotGraded() ? '—' : number_format($course->grade_point, 2) }}</div>
                <div class="col-12"><strong>Quality Points:</strong> {{ number_format($course->quality_points, 2) }}</div>
                @if ($course->description)
                    <div class="col-12"><strong>Description:</strong> {{ $course->description }}</div>
                @endif
            </div>
        </div>
    </div>

    @if ($course->gradeRecords->isNotEmpty())
        <div class="card">
            <div class="card-header card-header-custom">Grade History</div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr><th>Date</th><th>Term</th><th>Grade Point</th><th>Remarks</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($course->gradeRecords as $record)
                            <tr>
                                <td>{{ $record->created_at->format('Y-m-d') }}</td>
                                <td>{{ ucfirst($record->term) }}</td>
                                <td>{{ number_format($record->grade_point, 2) }}</td>
                                <td>{{ $record->remarks ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
