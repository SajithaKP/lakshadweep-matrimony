@extends('layouts.app') @section('title', 'View User') @section('content')<div class="container py-5"><a
        href="{{ route('admin.users') }}">← Back to users</a>
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }} · {{ $user->phone }}</p>
            <p>Status: <b>{{ $user->status }}</b> | Active: <b>{{ $user->is_active ? 'Yes' : 'No' }}</b></p>
            <hr>
            <h5>Basic</h5>
            <p>{{ optional($user->profile)->location }} · {{ optional($user->profile)->marital_status }} ·
                {{ optional($user->profile)->height }}</p>
            <h5>Family</h5>
            <p>{{ optional($user->familyDetail)->father_name }} ·
                {{ optional($user->familyDetail)->father_occupation }};
                {{ optional($user->familyDetail)->mother_name }} ·
                {{ optional($user->familyDetail)->mother_occupation }}</p>
            <h5>Education</h5>
            <p>{{ optional($user->educationDetail)->education_level }} ·
                {{ optional($user->educationDetail)->course }}</p>
            <h5>Professional</h5>
            <p>{{ optional($user->professionalDetail)->occupation }} ·
                {{ optional($user->professionalDetail)->job_title }}</p>
            <h5>Religion</h5>
            <p>{{ optional($user->religiousDetail)->religion }} ·
                {{ optional($user->religiousDetail)->religious_background }}</p>
        </div>
    </div>
</div>@endsection
