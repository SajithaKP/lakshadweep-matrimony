@extends('layouts.app') @section('title', 'Testimonials') @section('content')<div class="container py-5">
    <h2>Testimonials</h2>
    <form method="POST" action="{{ route('admin.testimonials.store') }}" class="card border-0 shadow-sm p-4 mb-4">@csrf
        <div class="row">
            <div class="col-md-4"><input name="name" class="form-control" placeholder="Customer / Couple name" required>
            </div>
            <div class="col-md-6"><input name="message" class="form-control" placeholder="Success story" required></div>
            <div class="col-md-2"><button class="btn btn-danger w-100">Add</button></div>
        </div>
    </form>
    @foreach ($items as $item)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <div><b>{{ $item->name }}</b>
                    <p class="mb-0">{{ $item->message }}</p>
                </div>
                <div>
                    <form method="POST" action="{{ route('admin.testimonials.toggle', $item) }}" class="d-inline">
                        @csrf<button
                            class="btn btn-sm btn-outline-secondary">{{ $item->is_active ? 'Hide' : 'Show' }}</button>
                    </form>
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $item) }}" class="d-inline">@csrf
                        @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form>
                </div>
            </div>
        </div>
    @endforeach
</div>@endsection
