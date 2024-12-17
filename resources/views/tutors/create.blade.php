@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Tutor</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('tutors.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tutors.store') }}" method="POST" class="row gy-3" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label">Tutor Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Image -->
                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Video -->
                        <div class="col-md-6">
                            <label class="form-label">Video</label>
                            <input type="file" name="video" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create Tutor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
