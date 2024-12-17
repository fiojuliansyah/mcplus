@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Translations for {{ $language->name }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('languages.index') }}" class="btn btn-secondary">Back to Languages</a>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('translations.update_multiple') }}" method="POST">
                @csrf
                @method('PUT')

                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Translation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($translations as $translation)
                        <tr>
                            <td>{{ $translation->key }}</td>
                            <td>
                                <input type="text" name="translations[{{ $translation->id }}]" class="form-control" value="{{ $translation->translation }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update Translations</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
