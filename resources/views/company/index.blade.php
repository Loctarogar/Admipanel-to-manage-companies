<html>
<head>
    <title>
        Company Index page
    </title>
</head>
<body>
@foreach($companies as $company)
    <p>{{ $company }}</p>
    <form method="post" action="{{ route('company.destroy', $company->id) }}">
        @csrf
        @method('delete')
        <input name="id" type="hidden" value="{{ $company->id }}">
        <input type="submit">
    </form>
@endforeach
</body>
</html>