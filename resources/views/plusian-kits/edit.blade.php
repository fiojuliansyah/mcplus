@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Edit Plusian Kit</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('plusian-kits.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('plusian-kits.update', $kit->id) }}" method="POST" class="row gy-3">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $kit->title) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Link</label>
                            <input type="url" name="link" class="form-control" value="{{ old('link', $kit->link) }}" required>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Update Plusian Kit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
