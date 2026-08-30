@extends('layouts.app') @section('title', 'Users') @section('content')<div class="container py-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>Customers</h2><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </div>
    <form class="row g-2 mb-4">
        <div class="col-md-6"><input name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Search name, email or phone"></div>
        <div class="col-md-3"><select name="status" class="form-select">
                <option value="">All statuses</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select></div>
        <div class="col-md-2"><select name="gender" class="form-select">
                <option value="">All genders</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select></div>
        <div class="col-md-1"><button class="btn btn-danger w-100">Go</button></div>
    </form>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->name }}<br><small>{{ $u->phone }}</small></td>
                        <td>{{ ucfirst($u->gender) }}</td>
                        <td>{{ optional($u->profile)->location ?? (optional($u->profile)->state ?? '-') }}</td>
                        <td><span
                                class="badge bg-{{ $u->status === 'approved' ? 'success' : ($u->status === 'pending' ? 'warning' : 'secondary') }}">{{ $u->status }}</span>
                        </td>
                        <td>{{ $u->is_active ? 'Yes' : 'No' }}</td>
                        <td class="d-flex gap-1"><a class="btn btn-sm btn-outline-dark"
                                href="{{ route('admin.users.show', $u) }}">View</a>
                            @if ($u->status !== 'approved')
                                <form method="POST" action="{{ route('admin.users.approve', $u) }}">@csrf<button
                                        class="btn btn-sm btn-success">Approve</button></form>
                            @endif
                            <form method="POST" action="{{ route('admin.users.toggle', $u) }}">
                                @csrf<button
                                    class="btn btn-sm btn-outline-secondary">{{ $u->is_active ? 'Deactivate' : 'Activate' }}</button>
                            </form>
                            <form method="POST" action="{{ route('admin.users.destroy', $u) }}"
                                onsubmit="return confirm('Delete this user?')">@csrf @method('DELETE')<button
                                    class="btn btn-sm btn-outline-danger">Delete</button></form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>{{ $users->links() }}
</div>@endsection
