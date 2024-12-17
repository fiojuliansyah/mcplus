@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Role</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST" class="row gy-3">
                        @csrf

                        <!-- Role Name -->
                        <div class="col-md-12">
                            <label class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">
                                Please provide a valid role name.
                            </div>
                        </div>

                        <!-- Permissions Group -->
                        @foreach($permissions->groupBy('group') as $groupName => $groupPermissions)
                            <div class="col-md-4 mb-3">
                                <h6 class="fw-semibold">{{ $groupName }}</h6>
                                @foreach($groupPermissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->name }}">
                                        <label class="form-check-label">&nbsp; {{ $permission->mock }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
