@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Program Images</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('program.images.create', ['slug' => $program->slug]) }}" class="btn btn-primary">+ Add Image</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <div class="row">
                @foreach($images as $image)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $image->image_url }}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <a href="{{ route('program.images.edit', ['slug' => $program->slug, 'id' => $image->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('program.images.destroy', ['slug' => $program->slug, 'id' => $image->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
