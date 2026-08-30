@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center
                flex-wrap gap-3 mb-4">

        <div>

            <h2 class="mb-1">
                Admin Dashboard
            </h2>

            <p class="text-muted mb-0">
                Lakshadweep Matrimony management
            </p>

        </div>

        <div class="d-flex gap-2 flex-wrap">

            <a href="{{ route('home') }}"
               class="btn btn-outline-primary">

                View Website

            </a>

            <a href="{{ route('admin.users') }}"
               class="btn btn-primary">

                Manage Users

            </a>

        </div>

    </div>


    {{-- STATISTICS --}}
    <div class="row g-4 mb-5">

        {{-- TOTAL --}}
        <div class="col-md-6 col-lg-3">

            <div class="admin-stat-card">

                <div class="admin-stat-icon total">
                    👥
                </div>

                <div>

                    <span>
                        Total Customers
                    </span>

                    <strong>
                        {{ $total }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- PENDING --}}
        <div class="col-md-6 col-lg-3">

            <div class="admin-stat-card">

                <div class="admin-stat-icon pending">
                    ⏳
                </div>

                <div>

                    <span>
                        Pending Approval
                    </span>

                    <strong>
                        {{ $pending }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- ACTIVE --}}
        <div class="col-md-6 col-lg-3">

            <div class="admin-stat-card">

                <div class="admin-stat-icon active">
                    ✓
                </div>

                <div>

                    <span>
                        Active
                    </span>

                    <strong>
                        {{ $active }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- INACTIVE --}}
        <div class="col-md-6 col-lg-3">

            <div class="admin-stat-card">

                <div class="admin-stat-icon inactive">
                    ⏸
                </div>

                <div>

                    <span>
                        Inactive
                    </span>

                    <strong>
                        {{ $inactive }}
                    </strong>

                </div>

            </div>

        </div>

    </div>


    {{-- MANAGEMENT --}}
    <div class="mb-4">

        <h4 class="mb-1">
            Website Management
        </h4>

        <p class="text-muted">
            Manage users, homepage content and customer testimonials.
        </p>

    </div>


    <div class="row g-4">


        {{-- USERS --}}
        <div class="col-md-6 col-lg-4">

            <div class="admin-management-card">

                <div class="management-icon">
                    👥
                </div>

                <h5>
                    Manage Users
                </h5>

                <p>
                    View registered customers, approve profiles,
                    reject profiles, activate or deactivate users.
                </p>

                <a href="{{ route('admin.users') }}"
                   class="btn btn-primary">

                    Manage Users →

                </a>

            </div>

        </div>


        {{-- SLIDES --}}
        <div class="col-md-6 col-lg-4">

            <div class="admin-management-card">

                <div class="management-icon">
                    🖼️
                </div>

                <h5>
                    Manage Slides
                </h5>

                <p>
                    Add homepage slider images, change slide content,
                    activate or deactivate slides.
                </p>

                <a href="{{ route('admin.slides') }}"
                   class="btn btn-primary">

                    Manage Slides →

                </a>

            </div>

        </div>


        {{-- TESTIMONIALS --}}
        <div class="col-md-6 col-lg-4">

            <div class="admin-management-card">

                <div class="management-icon">
                    ❤️
                </div>

                <h5>
                    Manage Testimonials
                </h5>

                <p>
                    Add happy customer stories and control which
                    testimonials appear on the website.
                </p>

                <a href="{{ route('admin.testimonials') }}"
                   class="btn btn-primary">

                    Manage Testimonials →

                </a>

            </div>

        </div>


    </div>


    {{-- QUICK ACTIONS --}}
    <div class="admin-quick-section mt-5">

        <h4>
            Quick Actions
        </h4>

        <div class="d-flex gap-3 flex-wrap mt-3">

            <a href="{{ route('home') }}"
               class="btn btn-outline-primary">

                🌐 View Website

            </a>

            <a href="{{ route('admin.users') }}"
               class="btn btn-outline-primary">

                👥 View Users

            </a>

            <a href="{{ route('admin.slides') }}"
               class="btn btn-outline-primary">

                🖼️ View Slides

            </a>

            <a href="{{ route('admin.testimonials') }}"
               class="btn btn-outline-primary">

                ❤️ View Testimonials

            </a>

        </div>

    </div>

</div>

@endsection