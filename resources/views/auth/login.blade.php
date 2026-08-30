@extends('layouts.app') @section('title', 'Login') @section('content')<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body p-5">
                    <h2>Welcome back</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('login.store') }}">@csrf<div class="mb-3">
                            <label>Email</label><input type="email" name="email" class="form-control" required></div>
                        <div class="mb-3"><label>Password</label><input type="password" name="password"
                                class="form-control" required></div>
                        <div class="mb-4"><label><input type="checkbox" name="remember"> Remember me</label></div>
                        <button class="btn btn-danger w-100">Login</button>
                    </form>
                    <p class="text-center mt-4">New here? <a href="{{ route('register') }}">Create an account</a></p>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
