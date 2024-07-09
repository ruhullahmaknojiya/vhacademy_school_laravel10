@extends('layouts.school_admin')

@section('content')
@section('title')
Fees Group List
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1> Fees Group List </h1>
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
                <h3 class="page-title">Fees Group List</h3>
            </div>
            <div class="col-auto text-end float-end ms-auto download-grp">

                <a href="{{ route('schooladmin.feecollection.feegroup.create') }}" class="btn btn-primary">Add Fee Group</a>

            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="feegroupTable">
        <thead class="">
            <tr>
                <th>Name</th>
                <th>Fees Code</th>
                <th>Description</th>
                <th>Fee Types</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeGroups as $feeGroup)
                <tr>
                    <td>{{ $feeGroup->name }}</td>
                    <td>{{ $feeGroup->fees_code }}</td>
                    <td>{{ $feeGroup->description }}</td>
                    <td>
                        @foreach ($feeGroup->feeTypes as $feeType)
                            <span class="badge badge-info">{{ $feeType->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feegroup.edit', $feeGroup->id) }}" class="btn btn-warning">Edit</a>
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
        $("#feegroupTable").DataTable({
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
