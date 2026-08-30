@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Complete Your Profile</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('profile.update') }}"
          enctype="multipart/form-data">

        @csrf

        {{-- ================= BASIC DETAILS ================= --}}
        <div class="card profile-section border-0 shadow-sm mb-4">
            <div class="card-body">

                <h5 class="mb-4">Basic Details</h5>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $u->name) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               value="{{ old('phone', $u->phone) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Date of Birth</label>
                        <input type="date"
                               name="date_of_birth"
                               class="form-control"
                               value="{{ old('date_of_birth', optional($u->profile)->date_of_birth?->format('Y-m-d')) }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Height</label>
                        <input type="text"
                            name="height"
                            class="form-control"
                            value="{{ old('height', optional($u->profile)->height) }}"
                            placeholder="e.g. 5'4&quot;">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Weight</label>
                        <input type="text"
                            name="weight"
                            class="form-control"
                            value="{{ old('weight', optional($u->profile)->weight) }}"
                            placeholder="e.g. 55 kg">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Languages Spoken</label>
                        <input type="text"
                            name="languages_spoken"
                            class="form-control"
                            value="{{ old('languages_spoken', optional($u->profile)->languages_spoken) }}"
                            placeholder="Malayalam, English, Hindi, Arabic">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Marital Status</label>

                        <select name="marital_status" class="form-select">
                            <option value="Never Married"
                                {{ optional($u->profile)->marital_status == 'Never Married' ? 'selected' : '' }}>
                                Never Married
                            </option>

                            <option value="Divorced"
                                {{ optional($u->profile)->marital_status == 'Divorced' ? 'selected' : '' }}>
                                Divorced
                            </option>

                            <option value="Widowed"
                                {{ optional($u->profile)->marital_status == 'Widowed' ? 'selected' : '' }}>
                                Widowed
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3"
                        id="children-field"
                        style="{{ in_array(optional($u->profile)->marital_status, ['Divorced', 'Widowed']) ? '' : 'display:none;' }}">

                        <label>No. of Children</label>

                        <input type="number"
                            name="children"
                            min="0"
                            class="form-control"
                            value="{{ old('children', optional($u->profile)->children) }}"
                            placeholder="Number of children">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Mother Tongue</label>
                        <input type="text"
                               name="mother_tongue"
                               class="form-control"
                               value="{{ old('mother_tongue', optional($u->profile)->mother_tongue) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>State</label>
                        <input type="text"
                               name="state"
                               class="form-control"
                               value="{{ old('state', optional($u->profile)->state) }}"
                               placeholder="Lakshadweep / Kerala / Other">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>District/Dweep Name</label>
                        <input type="text"
                               name="district"
                               class="form-control"
                               value="{{ old('district', optional($u->profile)->district) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Location</label>
                        <input type="text"
                               name="location"
                               class="form-control"
                               value="{{ old('location', optional($u->profile)->location) }}">
                    </div>
{{-- ================= PROFILE PHOTOS ================= --}}

<div class="card profile-section border-0 shadow-sm mb-4">

    <div class="card-body">

        <h5 class="mb-4">Profile Photos</h5>

        {{-- MAIN PROFILE PHOTO --}}
        <div class="mb-4">

            <h6>Main Profile Photo</h6>

            @if($u->profile_photo)

                <div class="mt-3">
                    <img src="{{ asset('storage/' . $u->profile_photo) }}"
                         alt="Main Profile Photo"
                         style="width:180px;
                                height:180px;
                                object-fit:cover;
                                border-radius:12px;"
                         class="img-thumbnail">
                </div>
                {{-- Change Main Profile Photo --}}
                <div class="mt-3">

                    <label class="form-label fw-semibold">
                        Change Main Profile Photo
                    </label>

                    <input type="file"
                        name="profile_photo"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp">

                    <small class="text-muted">
                        Upload a new photo to replace your current profile picture.
                    </small>

                </div>

            @else

                <div class="alert alert-light border">
                    No main profile photo uploaded.
                </div>

            @endif

        </div>


        {{-- ADD MORE PHOTOS --}}
        <div class="mb-3">

            <label class="form-label">
                Add More Photos
            </label>

            <input type="file"
                   name="photos[]"
                   class="form-control"
                   multiple
                   accept="image/jpeg,image/png,image/webp">

            <small class="text-muted">
                You can select up to 10 photos.
            </small>

        </div>


        {{-- EXISTING ADDITIONAL PHOTOS --}}
        @if($u->photos && $u->photos->count())

            <h6 class="mt-4 mb-3">
                Your Additional Photos
            </h6>

            <div class="row g-3">

                @foreach($u->photos as $photo)

                    <div class="col-6 col-md-3">

                        <div class="card shadow-sm">

                            <img src="{{ asset('storage/' . $photo->image) }}"
                                 alt="Additional Photo"
                                 class="card-img-top"
                                 style="height:180px;
                                        object-fit:cover;">

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="alert alert-light border">
                No additional photos uploaded yet.
            </div>

        @endif

    </div>

</div>

                    <div class="col-12 mb-3">
                        <label>About Me</label>
                        <textarea name="about"
                                  rows="4"
                                  class="form-control">{{ old('about', optional($u->profile)->about) }}</textarea>
                    </div>

                </div>
            </div>
        </div>


        {{-- ================= FAMILY DETAILS ================= --}}
        <div class="card profile-section border-0 shadow-sm mb-4">
            <div class="card-body">

                <h5 class="mb-4">Family Details</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>House Name</label>
                        <input type="text"
                            name="house_name"
                            class="form-control"
                            value="{{ old('house_name', optional($u->familyDetail)->house_name) }}"
                            placeholder="Enter house name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Father Name</label>
                        <input type="text"
                               name="father_name"
                               class="form-control"
                               value="{{ old('father_name', optional($u->familyDetail)->father_name) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Father Occupation</label>
                        <input type="text"
                               name="father_occupation"
                               class="form-control"
                               value="{{ old('father_occupation', optional($u->familyDetail)->father_occupation) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Mother Name</label>
                        <input type="text"
                               name="mother_name"
                               class="form-control"
                               value="{{ old('mother_name', optional($u->familyDetail)->mother_name) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Mother Occupation</label>
                        <input type="text"
                               name="mother_occupation"
                               class="form-control"
                               value="{{ old('mother_occupation', optional($u->familyDetail)->mother_occupation) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>No. of Brothers</label>
                        <input type="number"
                               name="brothers"
                               class="form-control"
                               value="{{ old('brothers', optional($u->familyDetail)->brothers) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>No. of Sisters</label>
                        <input type="number"
                               name="sisters"
                               class="form-control"
                               value="{{ old('sisters', optional($u->familyDetail)->sisters) }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Family Type</label>
                        <input type="text"
                               name="family_type"
                               class="form-control"
                               value="{{ old('family_type', optional($u->familyDetail)->family_type) }}"
                               placeholder="Nuclear / Joint">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Family Status</label>
                        <input type="text"
                               name="family_status"
                               class="form-control"
                               value="{{ old('family_status', optional($u->familyDetail)->family_status) }}"
                               placeholder="e.g., middle, rich, upper middle class">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Family Location</label>
                        <input type="text"
                               name="family_location"
                               class="form-control"
                               value="{{ old('family_location', optional($u->familyDetail)->family_location) }}">
                    </div>

                </div>
            </div>
        </div>


        {{-- ================= EDUCATION DETAILS ================= --}}
        
        <div class="card profile-section border-0 shadow-sm mb-4">

            <div class="card-body">

                <h5 class="mb-4">Education Details</h5>

                {{-- 10TH --}}
                <div class="education-box mb-4">

                    <h6>10th / SSLC</h6>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>School</label>

                            <input type="text"
                                name="tenth_school"
                                class="form-control"
                                value="{{ old('tenth_school', optional($u->educationDetail)->tenth_school) }}"
                                placeholder="School name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Percentage / Grade</label>

                            <input type="text"
                                name="tenth_percentage"
                                class="form-control"
                                value="{{ old('tenth_percentage', optional($u->educationDetail)->tenth_percentage) }}"
                                placeholder="e.g. 85% / A+">
                        </div>

                    </div>

                </div>


                {{-- PLUS TWO --}}
                <div class="education-box mb-4">

                    <h6>Plus Two / Higher Secondary</h6>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>Stream</label>

                            <select name="plus_two_stream" class="form-select">

                                <option value="">Select Stream</option>

                                <option value="Science"
                                    {{ optional($u->educationDetail)->plus_two_stream == 'Science' ? 'selected' : '' }}>
                                    Science
                                </option>

                                <option value="Commerce"
                                    {{ optional($u->educationDetail)->plus_two_stream == 'Commerce' ? 'selected' : '' }}>
                                    Commerce
                                </option>

                                <option value="Humanities"
                                    {{ optional($u->educationDetail)->plus_two_stream == 'Humanities' ? 'selected' : '' }}>
                                    Humanities
                                </option>

                                <option value="Vocational"
                                    {{ optional($u->educationDetail)->plus_two_stream == 'Vocational' ? 'selected' : '' }}>
                                    Vocational
                                </option>

                            </select>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>School</label>

                            <input type="text"
                                name="plus_two_school"
                                class="form-control"
                                value="{{ old('plus_two_school', optional($u->educationDetail)->plus_two_school) }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>Percentage / Grade</label>

                            <input type="text"
                                name="plus_two_percentage"
                                class="form-control"
                                value="{{ old('plus_two_percentage', optional($u->educationDetail)->plus_two_percentage) }}">

                        </div>

                    </div>

                </div>


                {{-- DEGREE --}}
                <div class="education-box mb-4">

                    <h6>Higher Education / Degree</h6>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>Education Level</label>

                            <select name="education_level" class="form-select">

                                <option value="">Select</option>

                                <option value="Diploma">Diploma</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="M.Phil">M.Phil</option>
                                <option value="PhD">PhD</option>

                            </select>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>Course / Degree</label>

                            <input type="text"
                                name="course"
                                class="form-control"
                                value="{{ old('course', optional($u->educationDetail)->course) }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>Institution</label>

                            <input type="text"
                                name="institution"
                                class="form-control"
                                value="{{ old('institution', optional($u->educationDetail)->institution) }}">

                        </div>

                    </div>

                </div>


                {{-- ADDITIONAL EDUCATION --}}
                <div id="additional-education">

                </div>


                <button type="button"
                        class="btn btn-outline-primary"
                        id="add-education">

                    + Add More Education

                </button>

            </div>

        </div>


        {{-- ================= PROFESSIONAL DETAILS ================= --}}
        <div class="card profile-section border-0 shadow-sm mb-4">
            <div class="card-body">

                <h5 class="mb-4">Professional Details</h5>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Occupation</label>
                        <input type="text"
                               name="occupation"
                               class="form-control"
                               value="{{ old('occupation', optional($u->professionalDetail)->occupation) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Job Title</label>
                        <input type="text"
                               name="job_title"
                               class="form-control"
                               value="{{ old('job_title', optional($u->professionalDetail)->job_title) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Company</label>
                        <input type="text"
                               name="company"
                               class="form-control"
                               value="{{ old('company', optional($u->professionalDetail)->company) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Work Location</label>
                        <input type="text"
                               name="work_location"
                               class="form-control"
                               value="{{ old('work_location', optional($u->professionalDetail)->work_location) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Income</label>
                        <input type="text"
                               name="income"
                               class="form-control"
                               value="{{ old('income', optional($u->professionalDetail)->income) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Experience</label>
                        <input type="text"
                               name="experience"
                               class="form-control"
                               value="{{ old('experience', optional($u->professionalDetail)->experience) }}">
                    </div>

                </div>
            </div>
        </div>


        {{-- ================= RELIGIOUS DETAILS ================= --}}
       {{-- ================= RELIGIOUS DETAILS ================= --}}

<div class="card profile-section border-0 shadow-sm mb-4">

    <div class="card-body">

        <h5 class="mb-4">Religious Details</h5>

        <div class="row">

            {{-- Religion --}}
            <div class="col-md-4 mb-3">

                <label>Religion</label>

                <select name="religion" class="form-select">

                    <option value="">Select Religion</option>

                    <option value="Islam"
                        {{ optional($u->religiousDetail)->religion == 'Islam' ? 'selected' : '' }}>
                        Islam
                    </option>

                    <option value="Other"
                        {{ optional($u->religiousDetail)->religion == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>

                </select>

            </div>


            {{-- Religious Background --}}
            <div class="col-md-4 mb-3">

                <label>Religious Background</label>

                <select name="religious_background" class="form-select">

                    <option value="">Select</option>

                    <option value="Practicing">Practicing</option>

                    <option value="Moderately Practicing">
                        Moderately Practicing
                    </option>

                    <option value="Traditional">
                        Traditional
                    </option>

                    <option value="Religious">
                        Religious
                    </option>

                    <option value="Other">
                        Other
                    </option>

                </select>

            </div>


            {{-- Division --}}
            <div class="col-md-4 mb-3">

                <label>Religious Division</label>

                <select name="religious_division" class="form-select">

                    <option value="">Select</option>

                    <option value="Sunni">Sunni</option>

                    <option value="Hanafi">Hanafi</option>

                    <option value="Shafi">Shafi</option>

                    <option value="Salafi">Salafi</option>

                    <option value="Other">Other</option>

                </select>

            </div>


            {{-- Quran --}}
            <div class="col-md-4 mb-3">

                <label>Reads Quran</label>

                <select name="quran_reading" class="form-select">

                    <option value="">Select</option>
                    <option value="Regularly">Regularly</option>
                    <option value="Occasionally">Occasionally</option>
                    <option value="Learning">Learning</option>
                    <option value="No">No</option>

                </select>

            </div>


            {{-- Hijab --}}
            <div class="col-md-4 mb-3">

                <label>Hijab</label>

                <select name="hijab" class="form-select">

                    <option value="">Select</option>
                    <option value="Always">Always</option>
                    <option value="Usually">Usually</option>
                    <option value="Sometimes">Sometimes</option>
                    <option value="No">No</option>
                    <option value="Not Applicable">Not Applicable</option>

                </select>

            </div>


            {{-- Prayer --}}
            <div class="col-md-4 mb-3">

                <label>Prayer</label>

                <select name="prayer" class="form-select">

                    <option value="">Select</option>

                    <option value="5 Times Regularly">
                        5 Times Regularly
                    </option>

                    <option value="Regularly">
                        Regularly
                    </option>

                    <option value="Sometimes">
                        Sometimes
                    </option>

                    <option value="Rarely">
                        Rarely
                    </option>

                </select>

            </div>


            {{-- Religious Values --}}
            <div class="col-12 mb-3">

                <label>Religious Values</label>

                <textarea name="religious_values"
                          rows="4"
                          class="form-control"
                          placeholder="Describe religious values, practices and expectations">{{ old('religious_values', optional($u->religiousDetail)->religious_values) }}</textarea>

            </div>

        </div>

    </div>

</div>

        {{-- ================= LIFESTYLE DETAILS ================= --}}
        <div class="card profile-section border-0 shadow-sm mb-4">
            <div class="card-body">

                <h5 class="mb-4">Lifestyle Details</h5>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Smoking</label>
                        <select name="smoking" class="form-select">
                            <option value="">Select</option>
                            <option value="No" {{ optional($u->lifestyleDetail)->smoking == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Occasionally" {{ optional($u->lifestyleDetail)->smoking == 'Occasionally' ? 'selected' : '' }}>Occasionally</option>
                            <option value="Yes" {{ optional($u->lifestyleDetail)->smoking == 'Yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Drinking</label>
                        <select name="drinking" class="form-select">
                            <option value="">Select</option>
                            <option value="No" {{ optional($u->lifestyleDetail)->drinking == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Occasionally" {{ optional($u->lifestyleDetail)->drinking == 'Occasionally' ? 'selected' : '' }}>Occasionally</option>
                            <option value="Yes" {{ optional($u->lifestyleDetail)->drinking == 'Yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Food Preference</label>
                        <input type="text"
                               name="food_preference"
                               class="form-control"
                               value="{{ old('food_preference', optional($u->lifestyleDetail)->food_preference) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Exercise</label>
                        <input type="text"
                               name="exercise"
                               class="form-control"
                               value="{{ old('exercise', optional($u->lifestyleDetail)->exercise) }}">
                    </div>
                      <div class="col-md-6 mb-3">

                        <label>Hobbies</label>

                        <input type="text"
                            name="hobbies"
                            class="form-control"
                            value="{{ old('hobbies', optional($u->lifestyleDetail)->hobbies) }}"
                            placeholder="Reading, Travelling, Cooking, Sports">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label>Interests</label>

                        <input type="text"
                            name="interests"
                            class="form-control"
                            value="{{ old('interests', optional($u->lifestyleDetail)->interests) }}"
                            placeholder="Technology, Business, Islamic Studies">

                    </div>
                    <div class="col-12 mb-3">
                        <label>Lifestyle Description</label>
                        <textarea name="lifestyle_description"
                                  rows="3"
                                  class="form-control">{{ old('lifestyle_description', optional($u->lifestyleDetail)->lifestyle_description) }}</textarea>
                    </div>

                </div>
            </div>
        </div>


        {{-- ================= PARTNER PREFERENCES ================= --}}
        <div class="card profile-section border-0 shadow-sm mb-4">
            <div class="card-body">

                <h5 class="mb-4">Partner Preferences</h5>

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label>Age From</label>
                        <input type="number"
                               name="age_from"
                               class="form-control"
                               value="{{ old('age_from', optional($u->partnerPreference)->age_from) }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Age To</label>
                        <input type="number"
                               name="age_to"
                               class="form-control"
                               value="{{ old('age_to', optional($u->partnerPreference)->age_to) }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Height From</label>
                        <input type="text"
                               name="height_from"
                               class="form-control"
                               value="{{ old('height_from', optional($u->partnerPreference)->height_from) }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Height To</label>
                        <input type="text"
                               name="height_to"
                               class="form-control"
                               value="{{ old('height_to', optional($u->partnerPreference)->height_to) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Preferred Marital Status</label>
                        <input type="text"
                               name="partner_marital_status"
                               class="form-control"
                               value="{{ old('partner_marital_status', optional($u->partnerPreference)->marital_status) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Preferred Education</label>
                        <input type="text"
                               name="partner_education"
                               class="form-control"
                               value="{{ old('partner_education', optional($u->partnerPreference)->education) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Preferred Occupation</label>
                        <input type="text"
                               name="partner_occupation"
                               class="form-control"
                               value="{{ old('partner_occupation', optional($u->partnerPreference)->occupation) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Preferred State</label>
                        <input type="text"
                               name="partner_state"
                               class="form-control"
                               value="{{ old('partner_state', optional($u->partnerPreference)->state) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Preferred District/Island</label>
                        <input type="text"
                               name="partner_district"
                               class="form-control"
                               value="{{ old('partner_district', optional($u->partnerPreference)->district) }}">
                    </div>
                    <div class="col-md-6 mb-3">

                        <label>Preferred Partner Language</label>

                        <input type="text"
                            name="partner_language"
                            class="form-control"
                            value="{{ old('partner_language', optional($u->partnerPreference)->language) }}"
                            placeholder="Malayalam, English, Hindi, Arabic">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Religious Background Preference</label>
                        <input type="text"
                               name="partner_religious_background"
                               class="form-control"
                               value="{{ old('partner_religious_background', optional($u->partnerPreference)->religious_background) }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label>Partner Expectations</label>
                        <textarea name="expectations"
                                  rows="4"
                                  class="form-control">{{ old('expectations', optional($u->partnerPreference)->expectations) }}</textarea>
                    </div>

                </div>
            </div>
        </div>


        {{-- SAVE --}}
        <div class="d-grid mb-5">
            <button type="submit" class="btn btn-danger btn-lg">
                Save Complete Profile
            </button>
        </div>

    </form>

</div>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const maritalStatus = document.querySelector('[name="marital_status"]');
    const childrenField = document.getElementById('children-field');

    function checkChildren() {

        if (
            maritalStatus.value === 'Divorced' ||
            maritalStatus.value === 'Widowed'
        ) {
            childrenField.style.display = 'block';
        } else {
            childrenField.style.display = 'none';
        }
    }

    maritalStatus.addEventListener('change', checkChildren);

    checkChildren();
});
</script>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const container = document.getElementById('additional-education');

    const button = document.getElementById('add-education');

    let educationCount = 0;

    button.addEventListener('click', function () {

        educationCount++;

        const box = document.createElement('div');

        box.className = 'education-box mb-4';

        box.innerHTML = `

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h6 class="mb-0">
                    Additional Education ${educationCount}
                </h6>

                <button type="button"
                        class="btn btn-sm btn-outline-danger remove-education">
                    Remove
                </button>

            </div>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label>Education Level</label>

                    <input type="text"
                           name="additional_education[${educationCount}][level]"
                           class="form-control"
                           placeholder="e.g. MBA">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Course</label>

                    <input type="text"
                           name="additional_education[${educationCount}][course]"
                           class="form-control"
                           placeholder="Course / Degree">

                </div>

                <div class="col-md-4 mb-3">

                    <label>Institution</label>

                    <input type="text"
                           name="additional_education[${educationCount}][institution]"
                           class="form-control"
                           placeholder="Institution">

                </div>

            </div>
        `;

        container.appendChild(box);

        box.querySelector('.remove-education')
            .addEventListener('click', function () {
                box.remove();
            });

    });

});

</script>
@endsection