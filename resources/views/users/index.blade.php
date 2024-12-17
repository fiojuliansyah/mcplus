@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">User List</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('users.create') }}" class="btn btn-primary">+ Create User</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr><th></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td><a href="javascript:void(0)" class="text-primary-600">{{ $user->name }}</a></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/user-list/user-list1.png') }}" alt="" class="flex-shrink-0 me-12 radius-8">
                                <h6 class="text-md mb-0 fw-medium flex-grow-1">{{ $user->email }}</h6>
                            </div>
                        </td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @foreach($user->getRoleNames() as $role)
                                <span class="badge bg-info">{{ $role }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center delete-user" data-id="{{ $user->id }}">
                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>               
            </table>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteForm" method="POST" action="" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('head')
@endpush

@push('js')
<script>
    let table = new DataTable('#dataTable');
    
    // Modal Delete Confirmation
    const deleteButtons = document.querySelectorAll('.delete-user');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.getAttribute('data-id');
            const actionUrl = `/users/${userId}`; // Adjust route to your user delete route
            deleteForm.action = actionUrl; // Update form action to user delete route
            deleteModal.show(); // Show modal
        });
    });
</script>
@endpush
