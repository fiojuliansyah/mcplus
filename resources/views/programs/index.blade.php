@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Program List</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('programs.create') }}" class="btn btn-primary">+ Create Program</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Feature</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $program)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td><a href="{{ route('programs.show', $program->slug) }}" class="text-primary-600">{{ $program->title }}</a></td>
                        <td><img src="{{ $program->image_url }}" alt="{{ $program->name }}" class="img-thumbnail" style="max-width: 100px;"></td>
                        <td>
                            <a href="{{ route('program.banners.index', $program->slug) }}" class="btn btn-sm btn-primary">
                                Add Banner
                            </a>
                            <a href="{{ route('program.images.index', $program->slug) }}" class="btn btn-sm btn-warning">
                                Add Image
                            </a>
                            <a href="{{ route('class_schedule_programs.index', $program->slug) }}" class="btn btn-sm btn-success">
                                Add Class
                            </a>
                            <a href="{{ route('forms.index', $program->slug) }}" class="btn btn-sm btn-info">
                                Add Form
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('programs.edit', $program->slug) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center delete-program" data-slug="{{ $program->slug }}">
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
        Are you sure you want to delete this program?
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
    const deleteButtons = document.querySelectorAll('.delete-program');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const programSlug = this.getAttribute('data-slug');
            const actionUrl = `/programs/${programSlug}`; // Adjust route to your program delete route
            deleteForm.action = actionUrl; // Update form action to program delete route
            deleteModal.show(); // Show modal
        });
    });
</script>
@endpush
