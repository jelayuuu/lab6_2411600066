@extends('layouts.app')

@section('title', 'Add Course')

@section('content')
    <div class="pb-2 mb-3 border-bottom">
        <h2>Add New Course</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('courses.store') }}">
                @include('courses._form')
            </form>
        </div>
    </div>
@endsection
