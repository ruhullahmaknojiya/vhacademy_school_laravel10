@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h2>Create Notice</h2>
    <form action="{{ route('schooladmin.notices.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
             <textarea id="editor" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="roles">Send To</label>
            <select name="roles[]" id="roles" class="form-control" multiple required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Send Notice</button>
    </form>
</div>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/4.24.0/standard/ckeditor.js"></script>
 <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
