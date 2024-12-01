@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Homework Details</h1>

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
@endsection
