@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Edit Link</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('links.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('links.update', $link->id) }}" method="POST" class="row gy-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $link->title) }}" required>
                        </div>
                        
                        <!-- Bio -->
                        <div class="col-md-6">
                            <label class="form-label">Bio</label>
                            <select name="bio_id" class="form-control" required>
                                <option value="">Select Bio</option>
                                @foreach($bios as $bio)
                                <option value="{{ $bio->id }}" {{ $link->bio_id == $bio->id ? 'selected' : '' }}>
                                        {{ $bio->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Link -->
                        <div class="col-md-6">
                            <label class="form-label">Link</label>
                            <input type="text" name="link" class="form-control" value="{{ old('link', $link->link) }}" required>
                        </div>
                        
                        <!-- Image -->
                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>


                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Update Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
