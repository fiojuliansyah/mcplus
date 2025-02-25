@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Edit Class Promo</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('promos.index', $classroom->slug) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('promos.update', ['slug'=>$classroom->slug, 'id'=>$promo->id]) }}" method="POST" class="row gy-3">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $promo->name) }}"" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Normal Price</label>
                            <input type="text" name="normal_price" class="form-control" value="{{ old('normal_price', $promo->normal_price) }}"" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Discount Price</label>
                            <input type="text" name="discount_price" class="form-control" value="{{ old('discount_price', $promo->discount_price) }}"" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Update Class Promo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
