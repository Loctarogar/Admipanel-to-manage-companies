<html>
<head>
    <title>
        Company Index page
    </title>
</head>
<body>
@foreach($companies as $company)
    <p>{{ $company }}</p>
@endforeach
</body>
</html>