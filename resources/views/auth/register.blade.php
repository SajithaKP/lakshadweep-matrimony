@extends('layouts.app') @section('title', 'Register') @section('content')<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow border-0">
                <div class="card-body p-4 p-md-5">
                    <h2>Create your profile</h2>
                    {{-- <p class="text-muted">First 6 months are planned as free registration.</p> --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">@csrf<div
                            class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Full Name</label><input name="name"
                                    value="{{ old('name') }}" class="form-control" required></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Gender</label><select name="gender"
                                    class="form-select" required>
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Email</label><input type="email"
                                    name="email" value="{{ old('email') }}" class="form-control" required></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Phone Number</label><input
                                    name="phone" value="{{ old('phone') }}" class="form-control" required></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Password</label><input type="password"
                                    name="password" class="form-control" required></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Confirm Password</label><input
                                    type="password" name="password_confirmation" class="form-control" required></div>
                            <div class="mb-4"><label class="form-label">Profile Photo</label><input type="file"
                                    name="profile_photo" class="form-control" accept="image/*"></div>
                        </div><button class="btn btn-danger w-100">Create Account</button></form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
