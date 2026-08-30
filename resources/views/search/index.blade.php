@extends('layouts.app')

@section('title', 'Find Matches')

@section('content')

<div class="container py-5">

    <h2>Find Your Match</h2>

    <p class="text-muted">
        Showing approved and active
        {{ auth()->user()->gender === 'male' ? 'female' : 'male' }}
        profiles.
    </p>

    {{-- SEARCH FILTER --}}
    <form class="card border-0 shadow-sm p-3 mb-4">

        <div class="row g-2">

            <div class="col-md-4">
                <input
                    name="state"
                    value="{{ request('state') }}"
                    class="form-control"
                    placeholder="State / Island">
            </div>

            <div class="col-md-4">
                <select name="education" class="form-select">

                    <option value="">Any Education</option>

                    <option value="Below 10th"
                        {{ request('education') == 'Below 10th' ? 'selected' : '' }}>
                        Below 10th
                    </option>

                    <option value="10th"
                        {{ request('education') == '10th' ? 'selected' : '' }}>
                        10th
                    </option>

                    <option value="+2"
                        {{ request('education') == '+2' ? 'selected' : '' }}>
                        +2
                    </option>

                    <option value="Diploma"
                        {{ request('education') == 'Diploma' ? 'selected' : '' }}>
                        Diploma
                    </option>

                    <option value="Degree"
                        {{ request('education') == 'Degree' ? 'selected' : '' }}>
                        Degree
                    </option>

                    <option value="PG"
                        {{ request('education') == 'PG' ? 'selected' : '' }}>
                        PG
                    </option>

                    <option value="Professional"
                        {{ request('education') == 'Professional' ? 'selected' : '' }}>
                        Professional
                    </option>

                </select>
            </div>

            <div class="col-md-3">
                <input
                    name="occupation"
                    value="{{ request('occupation') }}"
                    class="form-control"
                    placeholder="Occupation">
            </div>

            <div class="col-md-1">
                <button class="btn btn-danger w-100">
                    Go
                </button>
            </div>

        </div>

    </form>


    {{-- PROFILES --}}
    <div class="row g-4">

        @forelse($users as $u)

            <div class="col-sm-6 col-lg-3">

                <div class="card h-100 border-0 shadow-sm">

                    {{-- PROFILE PHOTO --}}
                    @if ($u->profile_photo)

                        <img
                            src="{{ asset('storage/' . $u->profile_photo) }}"
                            class="card-img-top profile-img"
                            alt="{{ $u->name }}">

                    @else

                        <div class="placeholder-photo">
                            ♡
                        </div>

                    @endif


                    <div class="card-body">

                        <h5>
                            {{ $u->name }}
                        </h5>

                        <p class="small text-muted">
                            {{ optional($u->profile)->location
                                ?? optional($u->profile)->state
                                ?? 'Location not added' }}
                        </p>

                        <p class="small">

                            {{ optional($u->educationDetail)->education_level
                                ?? 'Education not added' }}

                            ·

                            {{ optional($u->professionalDetail)->occupation
                                ?? 'Occupation not added' }}

                        </p>


                        {{-- IMPORTANT: OTHER CUSTOMER PROFILE --}}
                        <a
                            href="{{ route('customer.profile.show', $u->id) }}"
                            class="btn btn-outline-danger btn-sm">
                            View Profile
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info">
                    No matching approved profiles found yet.
                </div>

            </div>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

@endsection