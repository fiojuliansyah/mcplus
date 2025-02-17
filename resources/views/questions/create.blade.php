@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Question</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="POST" class="row gy-3" enctype="multipart/form-data">
                        @csrf

                        <!-- Question Text -->
                        <div class="col-md-12">
                            <label class="form-label">Question Text</label>
                            <input type="text" name="question_text" class="form-control" value="{{ old('question_text') }}" required>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control" required>
                                <option value="single">Single</option>
                                <option value="multiple">Multiple</option>
                                <option value="paragraph">Paragraph</option>
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6">
                            <label class="form-label">Image (Optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
