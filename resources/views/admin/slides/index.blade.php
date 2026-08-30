@extends('layouts.app')

@section('title', 'Manage Slides')

@section('content')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1>Manage Slides</h1>

                <p class="text-muted mb-0">
                    Add and manage homepage slider images.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
                ← Dashboard
            </a>

        </div>


        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        {{-- ADD SLIDE --}}
        <div class="card shadow-sm mb-5">

            <div class="card-header">
                <h5 class="mb-0">Add New Slide</h5>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.slides.store') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label">
                                Title
                            </label>

                            <input type="text" name="title" class="form-control"
                                placeholder="Your Journey to Marriage Starts Here" required>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Subtitle
                            </label>

                            <input type="text" name="subtitle" class="form-control"
                                placeholder="Simple • Private • Trusted">

                        </div>


                        <div class="col-12">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" class="form-control" rows="3"
                                placeholder="Create your profile and discover approved matches."></textarea>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Slide Image
                            </label>

                            <input type="file" name="image" class="form-control" accept="image/*" required>

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">
                                Button Text
                            </label>

                            <input type="text" name="button_text" class="form-control" placeholder="Create Your Profile">

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">
                                Button URL
                            </label>

                            <input type="text" name="button_url" class="form-control" placeholder="/register">

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">
                                Sort Order
                            </label>

                            <input type="number" name="sort_order" class="form-control" value="0">

                        </div>


                        <div class="col-md-3 d-flex align-items-end">

                            <div class="form-check mb-2">

                                <input type="checkbox" name="is_active" class="form-check-input" checked>

                                <label class="form-check-label">
                                    Active
                                </label>

                            </div>

                        </div>


                        <div class="col-12">

                            <button type="submit" class="btn btn-primary">

                                Add Slide

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>


        {{-- EXISTING SLIDES --}}
        <h4 class="mb-3">
            Existing Slides
        </h4>


        <div class="row g-4">

            @forelse($slides as $slide)
                <div class="col-lg-6">

                    <div class="card shadow-sm h-100">

                        <img src="{{ asset('storage/' . $slide->image) }}" class="card-img-top"
                            style="height:220px; object-fit:cover;" alt="{{ $slide->title }}">


                        <div class="card-body">

                            <h5>
                                {{ $slide->title }}
                            </h5>

                            @if ($slide->subtitle)
                                <p class="text-muted">
                                    {{ $slide->subtitle }}
                                </p>
                            @endif


                            @if ($slide->description)
                                <p>
                                    {{ $slide->description }}
                                </p>
                            @endif


                            <div class="d-flex gap-2">

                                {{-- ACTIVE / INACTIVE --}}
                                <form method="POST" action="{{ route('admin.slides.toggle', $slide) }}">

                                    @csrf

                                    <button type="submit"
                                        class="btn btn-sm
                                        {{ $slide->is_active ? 'btn-success' : 'btn-secondary' }}">

                                        {{ $slide->is_active ? 'Active' : 'Inactive' }}

                                    </button>

                                </form>


                                {{-- DELETE --}}
                                <form method="POST" action="{{ route('admin.slides.destroy', $slide) }}"
                                    onsubmit="return confirm('Delete this slide?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info">
                        No slides added yet.
                    </div>

                </div>
            @endforelse

        </div>

    </div>

@endsection
