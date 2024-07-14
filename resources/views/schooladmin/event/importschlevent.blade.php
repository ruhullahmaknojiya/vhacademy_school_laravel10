@extends('layouts.superadmin')

@section('title')
    Import Events
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <!-- You can add any additional headers here if needed -->
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-times-circle"></i> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Import Events</h3>
            </div>
            <form action="{{ route('superadmin.import.events') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="file">Choose Excel File:</label>
                        <input type="file" name="file" class="form-control" accept=".xlsx, .xls" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>

        <!-- Results Table -->
        @if(session('results'))
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Import Results</h3>
                </div>
                <div class="card-body">
                    <table id="resultsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Row Data</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('results') as $result)
                                <tr>
                                    <td>{{ json_encode($result['row']) }}</td>
                                    <td>{{ $result['status'] }}</td>
                                    <td>
                                        @if ($result['status'] == 'success')
                                            Event ID: {{ $result['event']->id }}
                                        @else
                                            Errors: {{ json_encode($result['errors']) }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
        $("#resultsTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#resultsTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
