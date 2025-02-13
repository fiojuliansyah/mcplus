@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Edit Class Schedule</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('class_schedule_programs.index', ['slug' => $program->slug]) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('class_schedule_programs.update', ['slug' => $program->slug, 'id' => $schedule->id]) }}" method="POST" class="row gy-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label class="form-label">Schedule Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $schedule->title) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Link</label>
                            <input type="text" name="link" class="form-control" value="{{ old('link', $schedule->link) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Current Image</label>
                            <img src="{{ $schedule->image_url }}" class="img-thumbnail" width="200">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Upload New Image (Optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Update Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
