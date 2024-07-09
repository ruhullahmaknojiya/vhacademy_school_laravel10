@extends('layouts.school_admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fee Assign</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Fees Assign  </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('schooladmin.feecollection.feesassign.create') }}" class="btn btn-primary">Assign New Fees</a>

                    </div>
                </div>
            </div>

    <div class="card-body">
    <table class="table table-bordered table-striped" id="feeAsignTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Fee Group</th>
                <th>Fee Type</th>
                <th>Medium</th>
                <th>Class</th>
                <th>Section</th>
                <th>FeeAmount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeAssignments as $feeAssignment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feeAssignment->feeGroup->name }}</td>
                    <td>{{ $feeAssignment->feesMaster->feeType->name }}</td>
                    <td>{{ $feeAssignment->medium->medium_name }}</td>
                    <td>{{ $feeAssignment->standard->standard_name }}</td>
                    <td>{{ $feeAssignment->section->class_name }}</td>
                    <td>{{ $feeAssignment->feesMaster->amount }}</td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feesassign.edit', $feeAssignment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        </div>
        </div>
    </section>
@endsection
@push('js')
<script>
    $(function() {
        $("#feeMsterTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "responsive": true,
            order: true,
            "scrollX": false,
            "buttons": ["copy", "csv", "excel", "pdf", ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
