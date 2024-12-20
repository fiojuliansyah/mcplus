@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Link List</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('links.create') }}" class="btn btn-primary">+ Create Link</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Title</th>
                        <th scope="col">Bio</th>
                        <th scope="col">Link</th>
                        <th scope="col">Image Preview</th>
                        <th scope="col">Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td class="text-primary-600 fw-bold">{{ $row->title }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->link }}</td>
                        <td><img src="{{ $row->icon_url }}" alt="{{ $row->title }}" class="img-thumbnail" style="width:75px; height:75px;"></td>
                        <td>{{ $row->created_at }}</td>
                        <td>
                            <a href="{{ route('links.edit', $row->id) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center delete-link" data-id="{{ $row->id }}">
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
        Are you sure you want to delete this link?
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
    const deleteButtons = document.querySelectorAll('.delete-link');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const linkSlug = this.getAttribute('data-id');
            const actionUrl = `links/${linkSlug}`; // Adjust route to your tutor delete route
            deleteForm.action = actionUrl; // Update form action to tutor delete route
            deleteModal.show(); // Show modal
        });
    });
</script>
@endpush
