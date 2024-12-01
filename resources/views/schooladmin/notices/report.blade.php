@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h2>Notice Report</h2>

   

    <div class="row">
        @if($onlyTeacherData)
            <div class="col-md-12">
                <h5>Teachers Who Viewed This Notice</h5>
                <table class="table table-bordered table-striped" id="teacherTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Viewed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teacherViews as $view)
                            <tr>
                                <td>{{ $view->user->teacher->first_name }} {{ $view->user->teacher->last_name }}</td>
                                <td>{{ $view->user->email }}</td>
                                <td>{{ $view->user->teacher->phone ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($view->viewed_at)->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($onlyParentData)
            <div class="col-md-12">
                <h5>Parents Who Viewed This Notice</h5>
                <table class="table table-bordered table-striped" id="parentTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Viewed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parentViews as $view)
                            <tr>
                                <td>{{ $view->user->name }}</td>
                                <td>{{ $view->user->email }}</td>
                                <td>{{ $view->user->parent->phone_number ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($view->viewed_at)->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-md-6">
                <h5>Teachers Who Viewed This Notice</h5>
                <table class="table table-bordered table-striped" id="teacherTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Viewed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teacherViews as $view)
                            <tr>
                                <td>{{ $view->user->name }}</td>
                                <td>{{ $view->user->email }}</td>
                                <td>{{ $view->user->teacher->phone_number ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($view->viewed_at)->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h5>Parents Who Viewed This Notice</h5>
                <table class="table table-bordered table-striped" id="parentTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Viewed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parentViews as $view)
                            <tr>
                                <td>{{ $view->user->name }}</td>
                                <td>{{ $view->user->email }}</td>
                                <td>{{ $view->user->parent->phone_number ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($view->viewed_at)->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
     <div class="card mb-4">
        <div class="card-header">
            <h4>{{ $notice->title }}</h4>
            <p>{{ \Carbon\Carbon::parse($notice->date)->format('d-m-Y') }}</p>
        </div>
        <div class="card-body">
            {!! $notice->content !!}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#teacherTable, #parentTable').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [[ 3, 'desc' ]]
        });
    });
</script>
@endpush
