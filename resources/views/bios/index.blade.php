@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Bio List</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('bios.create') }}" class="btn btn-primary">+ Create Bio</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Name</th>
                        <th scope="col">Preview Image</th>
                        <th scope="col">Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bios as $bio)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td class="text-primary-600 fw-bold">{{ $bio->name }}</td>
                        <td><img src="{{ $bio->image_url }}" alt="{{ $bio->name }}" class="img-thumbnail" style="width:75px; height:75px;"></td>
                        <td>{{ $bio->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('links.index', $bio->slug) }}" class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:list"></iconify-icon>
                            </a>
                            <a href="{{ route('bios.edit', $bio->slug) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center delete-bio" data-slug="{{ $bio->slug }}">
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
        Are you sure you want to delete this bio?
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
    const deleteButtons = document.querySelectorAll('.delete-bio');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const bioSlug = this.getAttribute('data-slug');
            const actionUrl = `bios/${bioSlug}`; // Adjust route to your tutor delete route
            deleteForm.action = actionUrl; // Update form action to tutor delete route
            deleteModal.show(); // Show modal
        });
    });
</script>
@endpush
