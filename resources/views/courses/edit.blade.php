@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="pb-2 mb-3 border-bottom">
        <h2>Edit Course: {{ $course->name }}</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('courses.update', $course) }}">
                @method('PUT')
                @include('courses._form')
            </form>
        </div>
    </div>
@endsection
