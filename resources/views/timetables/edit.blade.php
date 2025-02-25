@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Edit Time Table</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('timetables.index', $classroom->slug) }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('timetables.update', ['slug'=>$classroom->slug, 'id'=>$timeTable->id]) }}" method="POST" class="row gy-3">
                        @csrf
                        @method('PUT')

                        <!-- Day -->
                        <div class="col-md-12">
                            <label class="form-label">Day</label>
                            <input type="text" name="day" class="form-control" value="{{ old('day', $timeTable->day) }}" required>
                        </div>

                        <!-- Start Time -->
                        <div class="col-md-6">
                            <label class="form-label">Start Time</label>
                            <input type="time" name="start" class="form-control" value="{{ old('start', \Carbon\Carbon::parse($timeTable->start)->format('H:i')) }}" required>
                        </div>

                        <!-- End Time -->
                        <div class="col-md-6">
                            <label class="form-label">End Time</label>
                            <input type="time" name="end" class="form-control" value="{{ old('end', \Carbon\Carbon::parse($timeTable->end)->format('H:i')) }}" required>
                        </div>

                        <!-- Category -->
                        <div class="col-md-12">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $timeTable->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Group -->
                        <div class="col-md-12">
                            <label class="form-label">Group</label>
                            <input type="text" name="group" class="form-control" value="{{ old('group', $timeTable->group) }}" required>
                        </div>

                        <!-- Tutor -->
                        <div class="col-md-12">
                            <label class="form-label">Tutor</label>
                            <select name="tutor_id" class="form-control" required>
                                <option value="">Select Tutor</option>
                                @foreach ($tutors as $tutor)
                                    <option value="{{ $tutor->id }}" {{ old('tutor_id', $timeTable->tutor_id) == $tutor->id ? 'selected' : '' }}>
                                        {{ $tutor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Update Time Table</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
