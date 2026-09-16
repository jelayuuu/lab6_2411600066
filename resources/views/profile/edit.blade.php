@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="pb-2 mb-3 border-bottom">
        <h2>Profile</h2>
    </div>

    <div class="row g-4">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection