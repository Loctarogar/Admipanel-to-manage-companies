<html>
<head>
    <title>Single Company</title>
</head>
<body>
@if($company)
<p>{{ $company }}</p>
<p>{{ $company->name }}</p>
@endif
</body>
</html>