@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create User</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" class="row gy-3">
                        @csrf

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                            <div class="invalid-feedback">
                                Please provide a valid phone address.
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                <div class="invalid-feedback">
                                    Please provide a valid password.
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                <div class="invalid-feedback">
                                    Please confirm the password.
                                </div>
                            </div>
                        </div>

                        <!-- Roles -->
                        <div class="col-md-6">
                            <label class="form-label">Roles</label>
                            <select class="form-select" name="roles[]">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select at least one role.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-600">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
