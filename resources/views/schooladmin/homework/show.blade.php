@extends('layouts.school_admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Homework Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Homework Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ $homework->topic_title }}
            </div>
            <div class="card-body">
                <p><strong>Teacher:</strong> {{ $homework->teacher->first_name }} {{ $homework->teacher->last_name }}</p>
                <p><strong>Class:</strong> {{ $homework->medium->medium_name }} - {{ $homework->standard->standard_name }} ( {{ $homework->class->class_name }} )</p>
                <p><strong>Subject:</strong> {{ $homework->subject->subject }}</p>
                <p><strong>Date:</strong> {{ $homework->date }}</p>
                <p><strong>Submission Date:</strong> {{ $homework->submition_date }}</p>
                <p><strong>Status:</strong> {{ $homework->submition_status }}</p>
                <p><strong>Description:</strong> {{ $homework->topic_description }}</p>
                <p><strong>PDF File:</strong> <a href="{{ ($homework->pdf_file) }}" target="_blank">View PDF</a></p>
            </div>
        </div>
    </div>
</section>

@endsection
