@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Translation for {{ $language->name }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('languages.translations', $language->id) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('translations.store') }}" method="POST">
                @csrf

                <!-- Language ID (Hidden) -->
                <input type="hidden" name="language_id" value="{{ $language->id }}">

                <!-- Key -->
                <div class="mb-3">
                    <label for="key" class="form-label">Translation Key</label>
                    <input type="text" class="form-control" id="key" name="key" value="{{ old('key') }}" required>
                </div>

                <!-- Translation -->
                <div class="mb-3">
                    <label for="translation" class="form-label">Translation</label>
                    <input type="text" class="form-control" id="translation" name="translation" value="{{ old('translation') }}" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Save Translation</button>
            </form>
        </div>
    </div>

</div>
@endsection
