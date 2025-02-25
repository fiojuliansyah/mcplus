@extends('layouts.main')

@section('content')
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">{{ $classroom->name }} Time Table List</h6>
        <ul class="d-flex align-items-center gap-2">
            <a href="{{ route('timetables.create', $classroom->slug) }}" class="btn btn-primary">+ Create Time Table</a>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Day</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Category</th>
                        <th scope="col">Group</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeTables as $timeTable)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $timeTable->day }}</td>
                        <td>{{ \Carbon\Carbon::parse($timeTable->start)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($timeTable->end)->format('H:i') }}</td>
                        <td>{{ $timeTable->category->name }}</td>
                        <td>{{ $timeTable->group }}</td>
                        <td>{{ $timeTable->tutor->name }}</td>
                        <td>
                            <a href="{{ route('timetables.edit', ['id' => $timeTable->id, 'slug' => $classroom->slug]) }}" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center delete-time-table" 
                               data-id="{{ $timeTable->id }}" data-slug="{{ $classroom->slug }}">
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
        Are you sure you want to delete this time table?
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
    
    const deleteButtons = document.querySelectorAll('.delete-time-table');
    const deleteForm = document.getElementById('deleteForm');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const slug = this.getAttribute('data-slug');
            const id = this.getAttribute('data-id');
            const actionUrl = `/manage/classroom/${slug}/timetables/${id}`;
            deleteForm.action = actionUrl;
            deleteModal.show();
        });
    });
</script>
@endpush
