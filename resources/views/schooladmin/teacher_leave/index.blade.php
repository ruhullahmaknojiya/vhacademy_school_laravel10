@extends('layouts.school_admin')

@section('title', 'Teacher Leaves')

@section('content')
    <section class="content">
        <br>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Teacher Leaves</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="teacherLeaveTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Teacher Name</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Leave Days</th> <!-- New column -->
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaves as $leave)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $leave->teacher->first_name }} {{ $leave->teacher->last_name }}</td>
                                    <td>{{ ucfirst($leave->leave_type) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d M Y') }}</td>
                                    <td>{{ $leave->end_date ? \Carbon\Carbon::parse($leave->end_date)->format('d M Y') : 'N/A' }}</td>
                                    <td>{{ $leave->end_date ? \Carbon\Carbon::parse($leave->start_date)->diffInDays(\Carbon\Carbon::parse($leave->end_date)) + 1 : 'N/A' }}
                                    </td> <!-- Calculation for Leave Days -->
                                    <td>{{ $leave->reason }}</td>
                                   <td>
                                        @if($leave->status == 'Pending')
                                            <span class="badge badge-secondary">Pending</span>
                                        @elseif($leave->status == 'Approved')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($leave->status == 'Cancelled')
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateStatusModal" data-leave-id="{{ $leave->id }}" data-leave-status="{{ $leave->status }}">
                                            <i class="fa fa-edit"></i> Update Status
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $leaves->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Status Modal -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ url('/schooladmin/teacher_leaves/update') }}/0" id="updateStatusForm">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStatusModalLabel">Update Leave Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                        <input type="hidden" id="leave_id" name="leave_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $("#teacherLeaveTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#teacherLeaveTable_wrapper .col-md-6:eq(0)');

            // Handle the modal show event to populate the form action and status
           $('#updateStatusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var leaveId = button.data('leave-id');
    var leaveStatus = button.data('leave-status');

    var modal = $(this);
    modal.find('#leave_id').val(leaveId);
    modal.find('#status').val(leaveStatus);
    modal.find('form').attr('action', '/schooladmin/teacher_leaves/update/' + leaveId);
});
        });
    </script>
@endpush
