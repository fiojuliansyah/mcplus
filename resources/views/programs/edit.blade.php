@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Edit Image</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('program.images.index', ['slug' => $program->slug]) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('program.images.update', ['slug' => $program->slug, 'id' => $image->id]) }}" method="POST" class="row gy-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Current Image Preview -->
                        <div class="col-md-6">
                            <label class="form-label">Current Image</label>
                            <div>
                                <img src="{{ $image->image_url }}" class="img-thumbnail" width="200" alt="Current Image">
                            </div>
                        </div>

                        <!-- Upload New Image -->
                        <div class="col-md-6">
                            <label class="form-label">Upload New Image (Optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Update Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
