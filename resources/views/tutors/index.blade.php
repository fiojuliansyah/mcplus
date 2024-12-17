@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Tutor List</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('tutors.create') }}" class="btn btn-primary">+ Create Tutor</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Video</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutors as $tutor)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td><a href="{{ route('tutors.show', $tutor->slug) }}" class="text-primary-600">{{ $tutor->name }}</a></td>
                        <td>{{ $tutor->category->name }}</td>
                        <td><img src="{{ $tutor->image_url }}" alt="{{ $tutor->name }}" class="img-thumbnail" style="max-width: 100px;"></td>
                        <td><video width="100" controls><source src="{{ $tutor->video_url }}" type="video/mp4"></video></td>
                        <td>
                            <a href="{{ route('tutors.edit', $tutor->slug) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center delete-tutor" data-slug="{{ $tutor->slug }}">
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
        Are you sure you want to delete this tutor?
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
    const deleteButtons = document.querySelectorAll('.delete-tutor');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const tutorSlug = this.getAttribute('data-slug');
            const actionUrl = `/tutors/${tutorSlug}`; // Adjust route to your tutor delete route
            deleteForm.action = actionUrl; // Update form action to tutor delete route
            deleteModal.show(); // Show modal
        });
    });
</script>
@endpush
