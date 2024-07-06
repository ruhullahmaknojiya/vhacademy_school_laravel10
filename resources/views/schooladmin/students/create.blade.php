@extends('layouts.school_admin')


@section('content')

    {{-- <form action="{{ route('schooladmin.students.store') }}" method="POST" enctype="multipart/form-data"> --}}
        {{-- @csrf --}}
        <!-- Student Details -->
        @include('schooladmin.students.student-details-form')

        {{-- <!-- Parent/Guardian Details -->
        <h4 class="text" style="font-family: 'Roboto', sans-serif;">Parent/Guardian Details</h4>
        @include('schooladmin.students.parent-details-form')

        <!-- Miscellaneous Details -->
        <h4 class="text" style="font-family: 'Roboto', sans-serif;">Miscellaneous Details</h4>
        @include('schooladmin.students.miscellaneous-details-form')

        <!-- Document Details -->
        <h4 class="text" style="font-family: 'Roboto', sans-serif;">Upload Documents</h4>
        @include('schooladmin.students.document-details-form') --}}

        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    {{-- </form> --}}

@endsection


