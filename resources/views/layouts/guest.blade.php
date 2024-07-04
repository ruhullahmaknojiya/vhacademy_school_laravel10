<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="{{asset('/css/app.v1.css')}}" type="text/css" />


</head>
<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <!-- Add your JS links here -->
    <script src="{{asset('js/app.v1.js')}}"></script>
    <script src="{{asset('js/app.plugin.js')}}"></script>
</body>
</html>
