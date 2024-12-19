@extends('layouts.superadmin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<section class="content-header">
        <div class="container">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Medium List</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Medium Details</h3>
                </div>
                <div class="text-right col-md-6">
                    <a href="{{ route('superadmin.medium.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle" ></i> Add New Medium
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="mytables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mediums as $medium)
                    <tr>
                        <td>{{ $medium->id }}</td>
                        <td>{{ $medium->medium_name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('superadmin.medium.edit', $medium->id) }}" class="mr-1 btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('superadmin.medium.destroy', $medium->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fas fa-trash"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $mediums->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(function () {
            $("#mytables").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "responsive": true,
                order: true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf",]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });


    </script>


@endpush
