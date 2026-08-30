@extends('layouts.app') @section('title', 'Dashboard') @section('content')<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Welcome, {{ $u->name }}</h2>
            <p class="text-muted">Manage your matrimonial profile.</p>
        </div><span
            class="badge {{ $u->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $u->is_active ? 'Active' : 'Inactive' }}</span>
    </div>
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Profile Status</h5>
                    <p>Admin approval: <strong>{{ ucfirst($u->status) }}</strong></p>
                    <div class="progress mb-3" style="height:10px">
                        <div class="progress-bar" style="width:65%"></div>
                    </div>
                    <p class="small text-muted">Complete your profile to help others understand you better.</p><a
                        href="{{ route('profile.edit') }}" class="btn btn-danger">Edit Profile</a> <a
                        href="{{ route('search') }}" class="btn btn-outline-dark">Find Matches</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Profile visibility</h5>
                    <p class="small">Only approved and active profiles are shown in match search.</p>
                    <form method="POST" action="{{ route('profile.toggle') }}">@csrf<button
                            class="btn btn-outline-danger w-100">{{ $u->is_active ? 'Deactivate' : 'Activate' }}
                            Profile</button></form>
                    <form method="POST" action="{{ route('account.delete') }}" class="mt-2"
                        onsubmit="return confirm('Delete your account permanently?')">@csrf @method('DELETE')<button
                            class="btn btn-outline-secondary w-100">Delete Account</button></form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
