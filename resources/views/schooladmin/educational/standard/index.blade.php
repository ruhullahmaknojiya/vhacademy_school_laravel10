@extends('layouts.school_admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Standard List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Standard List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <form method="GET" action="{{ route('superadmin.standard.index') }}">
                    <div class="form-group">
                        <label for="medium_filter">Filter by Medium:</label>
                        <select name="medium_filter" id="medium_filter" class="form-control" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($mediums as $medium)
                            <option value="{{ $medium->id }}" {{ request('medium_filter') == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="mytables">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Medium</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($standards as $standard)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $standard->medium->medium_name }}</td>
                            <td>{{ $standard->standard_name }}</td>
                            <td>
                                <div class="btn-group">
                                    <span class="badge badge-success">{{ $standard->status ? 'Active' : 'Deactive' }}</span>

                                </div>
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
