@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Upload Image</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('program.images.index', ['slug' => $program->slug]) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('program.images.store', ['slug' => $program->slug]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary-600">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
