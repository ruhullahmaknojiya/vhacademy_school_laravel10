@extends('layouts.school_admin')

@section('title', 'Teacher')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Teachers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Teachers</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">Teacher List</h3>
                    </div>
                    <div class="text-right col-md-2">
                        <a href="{{ route('teacher.import-form') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Import Teacher
                        </a>
                    </div>
                    <div class="text-right col-md-2">
                        <a href="{{ route('schooladmin.teachers.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Add Teacher
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="teacherTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Staff ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $teacher->staff_id }}</td>
                                <td>{{ $teacher->user->name }}</td> <!-- Fetching username from the User model -->
                                <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->department }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('schooladmin.teachers.show', $teacher->id) }}" class="mr-1 btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!--<a href="" class="mr-1 btn btn-primary btn-sm">-->
                                    <!--    <i class="fas fa-edit"></i>-->
                                    <!--</a>-->
                                    <!--<form action="" method="POST" style="display:inline;">-->
                                    <!--    @csrf-->
                                    <!--    @method('DELETE')-->
                                    <!--    <button type="submit" class="btn btn-danger btn-sm">-->
                                    <!--        <i class="fas fa-trash"></i>-->
                                    <!--    </button>-->
                                    <!--</form>-->
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
            $("#teacherTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "order": true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#teacherTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
