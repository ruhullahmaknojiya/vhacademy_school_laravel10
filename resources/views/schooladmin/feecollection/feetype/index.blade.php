@extends('layouts.school_admin')

@section('content')

@section('title')
Fee Type
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1> Fee Type</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>


<div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">
              <div class="card card-table">
                  <div class="card-body">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Fee Type</h3>
            </div>
            <div class="col-auto text-end float-end ms-auto download-grp">

                <a href="{{ route('schooladmin.feecollection.feetype.create') }}" class="btn btn-primary">Add Fee Type</a>

            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered table-striped" id="eventTable">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Fees Code</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeTypes as $feeType)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feeType->name }}</td>
                    <td>{{ $feeType->fees_code }}</td>
                    <td>{{ $feeType->description }}</td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feetype.edit', $feeType->id) }}" class="btn btn-warning">Edit</a>
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
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(function() {
        $("#eventTable").DataTable({
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
