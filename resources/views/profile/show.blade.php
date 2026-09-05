@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">My Profile</h2>
            <p class="text-muted mb-0">
                View your matrimonial profile details.
            </p>
        </div>

        <a href="{{ route('profile.edit') }}"
           class="btn btn-primary">
            Edit Profile
        </a>

    </div>

    {{-- PROFILE PHOTO --}}
    <div class="profile-view-card mb-4">

        <div class="row align-items-center">

            {{-- MAIN PROFILE PHOTO --}}
            <div class="col-md-4 text-center mb-3 mb-md-0">

                @if($u->profile_photo)

                    <img src="{{ asset('storage/' . $u->profile_photo) }}"
                        alt="{{ $u->name }}"
                        class="img-fluid shadow-sm"
                        style="
                            width:220px;
                            height:250px;
                            object-fit:cover;
                            border-radius:15px;
                        ">

                @else

                    <div class="d-flex align-items-center justify-content-center bg-light mx-auto"
                        style="
                            width:220px;
                            height:250px;
                            border-radius:15px;
                        ">

                        <span class="text-muted">
                            No Profile Photo
                        </span>

                    </div>

                @endif

            </div>


            {{-- PROFILE NAME --}}
            <div class="profile-for-badge">
                <span>Profile created for:</span>
                <strong>{{ $u->profile_for ?? 'Myself' }}</strong>
            </div>
            <div class="col-md-8">

                <h2 class="mb-2">
                    {{ $u->name }}
                </h2>


                @if($u->profile_photo)

                    <span class="badge bg-success">
                        Profile Photo Added
                    </span>

                @else

                    <span class="badge bg-warning text-dark">
                        Profile Photo Not Added
                    </span>

                @endif

            </div>

        </div>

    </div>


    {{-- BASIC DETAILS --}}
    <div class="profile-view-card">

        <div class="profile-section-title">
            Basic Details
        </div>

        <div class="row">

            <div class="col-md-6 profile-item">
                <span>Name</span>
                <strong>{{ $u->name ?: 'Not added' }}</strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Phone</span>
                <strong>{{ $u->phone ?: 'Not added' }}</strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Date of Birth</span>
                <strong>
                    {{ optional($u->profile)->date_of_birth
                        ? $u->profile->date_of_birth->format('d-m-Y')
                        : 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Height</span>
                <strong>
                    {{ optional($u->profile)->height
                        ? $u->profile->height . ' cm'
                        : 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Weight</span>
                <strong>
                    {{ optional($u->profile)->weight
                        ? $u->profile->weight . ' kg'
                        : 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Languages Spoken</span>
                <strong>
                    {{ optional($u->profile)->languages_spoken ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Marital Status</span>
                <strong>
                    {{ optional($u->profile)->marital_status ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Mother Tongue</span>
                <strong>
                    {{ optional($u->profile)->mother_tongue ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>State</span>
                <strong>
                    {{ optional($u->profile)->state ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>District / Dweep</span>
                <strong>
                    {{ optional($u->profile)->district ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Location</span>
                <strong>
                    {{ optional($u->profile)->location ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-12 profile-item">
                <span>About Me</span>
                <strong>
                    {{ optional($u->profile)->about ?: 'Not added' }}
                </strong>
            </div>

        </div>
    </div>


    {{-- FAMILY DETAILS --}}
    <div class="profile-view-card">

        <div class="profile-section-title">
            Family Details
        </div>

        <div class="row">

            <div class="col-md-6 profile-item">
                <span>House Name</span>
                <strong>
                    {{ optional($u->familyDetail)->house_name ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Father Name</span>
                <strong>
                    {{ optional($u->familyDetail)->father_name ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Father Occupation</span>
                <strong>
                    {{ optional($u->familyDetail)->father_occupation ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Mother Name</span>
                <strong>
                    {{ optional($u->familyDetail)->mother_name ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Mother Occupation</span>
                <strong>
                    {{ optional($u->familyDetail)->mother_occupation ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-3 profile-item">
                <span>Brothers</span>
                <strong>
                    {{ optional($u->familyDetail)->brothers ?? 'Not added' }}
                </strong>
            </div>

            <div class="col-md-3 profile-item">
                <span>Sisters</span>
                <strong>
                    {{ optional($u->familyDetail)->sisters ?? 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Family Type</span>
                <strong>
                    {{ optional($u->familyDetail)->family_type ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Family Status</span>
                <strong>
                    {{ optional($u->familyDetail)->family_status ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Family Location</span>
                <strong>
                    {{ optional($u->familyDetail)->family_location ?: 'Not added' }}
                </strong>
            </div>

        </div>
    </div>


    {{-- EDUCATION --}}
    <div class="profile-view-card">

        <div class="profile-section-title">
            Education Details
        </div>

        <div class="row">

            <div class="col-md-4 profile-item">
                <span>10th</span>
                <strong>
                    {{ optional($u->educationDetail)->tenth ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Plus Two</span>
                <strong>
                    {{ optional($u->educationDetail)->plus_two ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Education Level</span>
                <strong>
                    {{ optional($u->educationDetail)->education_level ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Course</span>
                <strong>
                    {{ optional($u->educationDetail)->course ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Institution</span>
                <strong>
                    {{ optional($u->educationDetail)->institution ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Education Details</span>
                <strong>
                    {{ optional($u->educationDetail)->education_details ?: 'Not added' }}
                </strong>
            </div>

        </div>
    </div>


    {{-- PROFESSIONAL --}}
    <div class="profile-view-card">

        <div class="profile-section-title">
            Professional Details
        </div>

        <div class="row">

            <div class="col-md-6 profile-item">
                <span>Occupation</span>
                <strong>
                    {{ optional($u->professionalDetail)->occupation ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Job Title</span>
                <strong>
                    {{ optional($u->professionalDetail)->job_title ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Company</span>
                <strong>
                    {{ optional($u->professionalDetail)->company ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Work Location</span>
                <strong>
                    {{ optional($u->professionalDetail)->work_location ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Income</span>
                <strong>
                    {{ optional($u->professionalDetail)->income ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Experience</span>
                <strong>
                    {{ optional($u->professionalDetail)->experience ?: 'Not added' }}
                </strong>
            </div>

        </div>
    </div>


    {{-- RELIGIOUS DETAILS --}}
    <div class="profile-view-card">

        <div class="profile-section-title">
            Religious Details
        </div>

        <div class="row">

            <div class="col-md-4 profile-item">
                <span>Religion</span>
                <strong>
                    {{ optional($u->religiousDetail)->religion ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Religious Background</span>
                <strong>
                    {{ optional($u->religiousDetail)->religious_background ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Division</span>
                <strong>
                    {{ optional($u->religiousDetail)->division ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Quran Reading</span>
                <strong>
                    {{ optional($u->religiousDetail)->read_quran ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Hijab</span>
                <strong>
                    {{ optional($u->religiousDetail)->wear_hijab ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-4 profile-item">
                <span>Prayer</span>
                <strong>
                    {{ optional($u->religiousDetail)->prayer ?: 'Not added' }}
                </strong>
            </div>

        </div>
    </div>


    {{-- LIFESTYLE --}}
    <div class="profile-view-card">

        <div class="profile-section-title">
            Lifestyle & Interests
        </div>

        <div class="row">

            <div class="col-md-6 profile-item">
                <span>Smoking</span>
                <strong>
                    {{ optional($u->lifestyleDetail)->smoking ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Drinking</span>
                <strong>
                    {{ optional($u->lifestyleDetail)->drinking ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Food Preference</span>
                <strong>
                    {{ optional($u->lifestyleDetail)->food_preference ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Exercise</span>
                <strong>
                    {{ optional($u->lifestyleDetail)->exercise ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Hobbies</span>
                <strong>
                    {{ optional($u->lifestyleDetail)->hobbies ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Interests</span>
                <strong>
                    {{ optional($u->lifestyleDetail)->interests ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-12 profile-item">
                <span>Lifestyle Description</span>
                <strong>
                    {{ optional($u->lifestyleDetail)->lifestyle_description ?: 'Not added' }}
                </strong>
            </div>

        </div>
    </div>


    {{-- PARTNER PREFERENCES --}}
    <div class="profile-view-card">

        <div class="profile-section-title">
            Partner Preferences
        </div>

        <div class="row">

            <div class="col-md-3 profile-item">
                <span>Age From</span>
                <strong>
                    {{ optional($u->partnerPreference)->age_from ?? 'Not added' }}
                </strong>
            </div>

            <div class="col-md-3 profile-item">
                <span>Age To</span>
                <strong>
                    {{ optional($u->partnerPreference)->age_to ?? 'Not added' }}
                </strong>
            </div>

            <div class="col-md-3 profile-item">
                <span>Height From</span>
                <strong>
                    {{ optional($u->partnerPreference)->height_from ?? 'Not added' }}
                </strong>
            </div>

            <div class="col-md-3 profile-item">
                <span>Height To</span>
                <strong>
                    {{ optional($u->partnerPreference)->height_to ?? 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Marital Status</span>
                <strong>
                    {{ optional($u->partnerPreference)->marital_status ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Education</span>
                <strong>
                    {{ optional($u->partnerPreference)->education ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Occupation</span>
                <strong>
                    {{ optional($u->partnerPreference)->occupation ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>State</span>
                <strong>
                    {{ optional($u->partnerPreference)->state ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>District</span>
                <strong>
                    {{ optional($u->partnerPreference)->district ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-md-6 profile-item">
                <span>Partner Religious Background</span>
                <strong>
                    {{ optional($u->partnerPreference)->religious_background ?: 'Not added' }}
                </strong>
            </div>

            <div class="col-12 profile-item">
                <span>Expectations</span>
                <strong>
                    {{ optional($u->partnerPreference)->expectations ?: 'Not added' }}
                </strong>
            </div>

        </div>
    </div>


    {{-- EDIT BUTTON --}}
    <div class="text-center mt-4 mb-5">

        <a href="{{ route('profile.edit') }}"
           class="btn btn-primary btn-lg px-5">
            Add / Edit Profile Details
        </a>

    </div>

</div>

@endsection