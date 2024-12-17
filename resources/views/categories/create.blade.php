@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Category</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" class="row gy-3">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
