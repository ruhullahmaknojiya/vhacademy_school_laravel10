@extends('layouts.school_admin')
@section('title')
    Import Teachers
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">

        </div>
    </div><!-- /.container-fluid -->
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
                <h3 class="card-title">Import Teachers</h3>
            </div>
            <form action="{{ route('teacher.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="file">Choose Excel File:</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
         <!-- Results Table -->
         @if(!empty($results))
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
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ json_encode($result['row']) }}</td>
                                <td>{{ $result['status'] }}</td>
                                <td>
                                    @if ($result['status'] == 'success')
                                        Teacher ID: {{ $result['teacher']->id }}
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
@endsection

