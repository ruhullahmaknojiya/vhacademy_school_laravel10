@extends('layouts.school_admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0">Notices</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Notices</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
    <div class="container-fluid">


        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 5px;">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Notices</h4>
                        <a href="{{ route('schooladmin.notices.create') }}" class="btn btn-primary ms-auto">Create Notice</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Teachers Seen</th>
                                    <th>Parents Seen</th>
                                    <th>Total Seen</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($notices->isNotEmpty())
                                    @foreach($notices as $notice)
                                        <tr>
                                            <td>{{ $notice->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($notice->date)->format('d-m-Y') }}</td>
                                            <td>{{ $notice->teacher_views }} Teachers</td>
                                            <td>{{ $notice->parent_views }} Parents</td>
                                            <td>{{ $notice->total_views }} Total Views</td>
                                            <td>
                                                <a href="{{ route('schooladmin.notices.report', $notice->id) }}" class="mr-1 btn btn-info btn-sm">View Report</a>
                                                <form action="{{ route('schooladmin.notices.destroy', $notice->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notice?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align: center;">
                                            No Records Found
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection
