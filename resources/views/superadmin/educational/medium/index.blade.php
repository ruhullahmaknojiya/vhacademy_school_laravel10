@extends('layouts.superadmin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Medium List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Medium List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="justify-content-between card-header d-flex">
                <h4>Medium Details</h4>
                <a href="{{ route('superadmin.medium.create') }}" class="btn btn-primary ms-auto">
                    <i class="fas fa-plus-circle"></i> Add Medium
                </a>
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
</section>


@endsection
@push('js')
<script>
    $(function() {
        $("#mytables").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": true
            , "responsive": true
            , order: true
            , "scrollX": false
            , "buttons": ["copy", "csv", "excel", "pdf", ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>


@endpush
