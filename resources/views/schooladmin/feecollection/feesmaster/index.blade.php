@extends('layouts.school_admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fees Master</h1>
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
                        <h3 class="card-title">Fees Master  </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('schooladmin.feecollection.feesmaster.create') }}" class="btn btn-primary">Add Fees Master</a>

                    </div>
                </div>
            </div>

    <div class="card-body">

          <table class="table table-bordered table-striped" id="feeMsterTable">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Fees Group</th>
                    <th>Fees Type</th>
                    <th>Due Date</th>
                    <th>Amount</th>
                    <th>Fine Type</th>
                    <th>Percentage</th>
                    <th>Fix Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feesMasters as $feesMaster)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $feesMaster->feeGroup->name }}</td>
                        <td>{{ $feesMaster->feeType->name }}</td>
                        <td>{{ $feesMaster->due_date }}</td>
                        <td>{{ $feesMaster->amount }}</td>
                        <td>{{ $feesMaster->fine_type }}</td>
                        <td>{{ $feesMaster->percentage }}</td>
                        <td>{{ $feesMaster->fix_amount }}</td>
                        <td>
                            <a href="{{ route('schooladmin.feecollection.feesmaster.edit', $feesMaster->id) }}" class="btn btn-warning">Edit</a>
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
