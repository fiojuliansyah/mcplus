@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Edit Banner</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('plusian-kit.images.index', ['slug' => $plusian->slug]) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('plusian-kit.images.update', ['slug' => $plusian->slug, 'id' => $image->id]) }}" method="POST" class="row gy-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label class="form-label">Current Banner</label>
                            <div>
                                <img src="{{ $image->image_url }}" class="img-thumbnail" width="200">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Upload New Image (Optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Update Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
