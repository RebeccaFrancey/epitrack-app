<!DOCTYPE html>
<html>
<head>
    {{-- <title>{{ $title }}</title> --}}
</head>
<body>
    <p>{{ $data->category }}</p>

    <br>

    <p>{{$data->severity}}</p>

    {{-- <p>Place your dynamic content here.</p> --}}

    <br>

    <p style="text-align: center;">{!! $footer !!}</p>
</body>
</html>
