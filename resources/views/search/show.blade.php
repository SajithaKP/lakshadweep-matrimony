@extends('layouts.app') @section('title', $user->name) @section('content')<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" class="profile-large">@else<div
                        class="placeholder-large">♡</div>
                @endif
                <div class="card-body text-center">
                    <h2>{{ $user->name }}</h2><span class="badge bg-success">Approved · Active</span>
                    <p class="text-muted mt-2">
                        {{ optional($user->profile)->location ?? optional($user->profile)->state }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4>About</h4>
                    <p>{{ optional($user->profile)->about ?? 'No introduction added yet.' }}</p>
                    <hr>
                    <h5>Basic Details</h5>
                    <div class="row small">
                        <div class="col-md-6">Date of birth:
                            {{ optional($user->profile)->date_of_birth?->format('d M Y') ?? '-' }}</div>
                        <div class="col-md-6">Height: {{ optional($user->profile)->height ?? '-' }}</div>
                        <div class="col-md-6">Marital status: {{ optional($user->profile)->marital_status ?? '-' }}
                        </div>
                        <div class="col-md-6">Mother tongue: {{ optional($user->profile)->mother_tongue ?? '-' }}</div>
                    </div>
                    <hr>
                    <h5>Education & Professional</h5>
                    <p>{{ optional($user->educationDetail)->education_level ?? '-' }} ·
                        {{ optional($user->educationDetail)->course ?? '' }}</p>
                    <p>{{ optional($user->professionalDetail)->occupation ?? '-' }} ·
                        {{ optional($user->professionalDetail)->work_location ?? '' }}</p>
                    <hr>
                    <h5>Religion</h5>
                    <p>{{ optional($user->religiousDetail)->religion ?? 'Islam' }} ·
                        {{ optional($user->religiousDetail)->religious_background ?? 'Not specified' }}</p>
                    <hr>
                    <h5>Lifestyle & Interests</h5>
                    <p>{{ optional($user->lifestyleDetail)->food_preference ?? '' }}
                        {{ optional($user->lifestyleDetail)->music ?? '' }}
                        {{ optional($user->lifestyleDetail)->sports ?? '' }}
                        {{ optional($user->lifestyleDetail)->hobbies ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
