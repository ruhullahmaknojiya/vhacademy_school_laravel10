@extends('layouts.school_admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Standard List</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="container">

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
