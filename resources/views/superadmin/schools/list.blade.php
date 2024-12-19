@extends('layouts.superadmin')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Schools List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Schools List</li>
                    </ol>
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
                    <h3 class="card-title">School Details</h3>
                </div>
                <div class="text-right col-md-6">
                    <a href="{{ route('school.register.form') }}" class="btn btn-primary" >
                        <i class="fas fa-plus-circle" ></i> Add School
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="mytables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>School Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Admin Name</th>
                        <th>Admin Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->address }}</td>
                            <td>{{ $school->phone }}</td>
                            <td>{{ $school->user->name }}</td>
                            <td>{{ $school->user->email }}</td>
                            <td class="d-flex">
                                <a href="{{ route('schools.show', $school->id) }}" class="mr-1 btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="javascript:void(0);" class="mr-1 btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="javascript:void(0);" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $schools->links() }}
            </div>
        </div>
    </div>
    </div>
</section>
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
