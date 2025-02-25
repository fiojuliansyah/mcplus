@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Classroom List</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('classrooms.create') }}" class="btn btn-primary">+ Create Classroom</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Features</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($classrooms as $classroom)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('classrooms.show', $classroom->slug) }}" class="text-primary-600">{{ $classroom->name }}</a></td>
                        <td>{{ $classroom->slug }}</td>
                        <td>
                            <a href="{{ route('timetables.index', $classroom->slug) }}" class="btn btn-sm btn-primary">
                                TimeTables
                            </a>
                            <a href="{{ route('promos.index', $classroom->slug) }}" class="btn btn-sm btn-warning">
                                Price / Promo
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('classrooms.edit', $classroom->slug) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center delete-classroom" data-id="{{ $classroom->slug }}">
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

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this classroom?
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

@push('js')
<script>
    let table = new DataTable('#dataTable');
    
    const deleteButtons = document.querySelectorAll('.delete-classroom');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const classroomSlug = this.getAttribute('data-id');
            const actionUrl = `/classrooms/${classroomSlug}`; 
            deleteForm.action = actionUrl;
            deleteModal.show();
        });
    });
</script>
@endpush
