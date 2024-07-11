<!DOCTYPE html>
<html>
<head>
    <title>Import Teachers</title>
</head>
<body>
    <h1>Import Teachers</h1>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('teacher.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Choose Excel File:</label>
        <input type="file" name="file" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
