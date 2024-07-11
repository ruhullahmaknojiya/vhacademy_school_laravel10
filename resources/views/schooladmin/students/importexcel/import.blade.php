<!DOCTYPE html>
<html>
<head>
    <title>Import Students</title>
</head>
<body>
    <h1>Import Students</h1>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Choose Excel File:</label>
        <input type="file" name="file" required>

        <label for="medium">Select Medium:</label>
        <select name="medium_id" required>
            @foreach($mediums as $medium)
                <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
            @endforeach
        </select>

        <label for="standard">Select Standard:</label>
        <select name="class_id" required>
            @foreach($standards as $standard)
                <option value="{{ $standard->id }}">{{ $standard->standard_name }}</option>
            @endforeach
        </select>

        <label for="class">Select Class:</label>
        <select name="section_id" required>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
            @endforeach
        </select>

        <button type="submit">Import</button>
    </form>
</body>
</html>
