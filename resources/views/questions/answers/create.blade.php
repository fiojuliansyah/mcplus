@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Answer for: {{ $question->question_text }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('answers.index', $question->id) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('answers.store', $question->id) }}" method="POST" class="row gy-3">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label">Answer Text</label>
                            <input type="text" name="answer_text" class="form-control" value="{{ old('answer_text') }}" required>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create Answer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
