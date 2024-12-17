@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Language</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('languages.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('languages.store') }}" method="POST" class="row gy-3">
                        @csrf

                        <!-- Language Code -->
                        <div class="col-md-6">
                            <label for="code" class="form-label">Language Code</label>
                            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
                            <div class="invalid-feedback">
                                Please provide a valid language code.
                            </div>
                        </div>

                        <!-- Language Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Language Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">
                                Please provide a valid language name.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create Language</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
