@extends('layouts.school_admin')
@section('title', 'Parents')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Parent Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Parent Details</li>
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
                <div class="col-md-6">
                    <h4>Parent Details</h4>
                </div>

            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="parentsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>No. oF Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parents as $parent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $parent->user->name }}</td>
                            <td>{{ $parent->father_name }}</td>
                            <td>{{ $parent->father_phone }}</td>
                            <td>{{ $parent->guardian_email }}</td>
                            <td>{{ $parent->students->count() }}</td> <!-- Display number of students -->
                            <td class="d-flex">
                                <a href="{{ route('schooladmin.parents.show', $parent->id) }}" class="mr-1 btn btn-info btn-sm">
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
@endsection

@push('js')
<script>
    $(function() {
        var table = $("#parentsTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "order": true,
            "scrollX": false,
            "buttons": ["copy", "csv", "excel", "pdf"]
        });

        table.buttons().container().appendTo('#parentsTable_wrapper .col-md-6:eq(0)').addClass('float-left');
    });
</script>

<style>
    .dt-buttons {
        float: left;
    }
</style>
@endpush
