@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Form</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('forms.index', $program->slug) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('forms.store', ['slug' => $program->slug]) }}" method="POST" class="row gy-3" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label">Form Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6">
                            <label class="form-label">Link</label>
                            <input type="text" name="link" class="form-control" value="{{ old('title') }}" required>
                        </div>


                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
