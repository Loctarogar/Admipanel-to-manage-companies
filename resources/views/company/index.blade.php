<html>
<head>
    <title>
        Company Index page
    </title>
</head>
<body>
@foreach($companies as $company)
    <p>{{ $company }}</p>
    <img src="{{ asset('storage/'.$company->logo) }}" height="100" width="100">
    <form method="post" action="{{ route('company.destroy', $company->id) }}">
        @csrf
        @method('delete')
        <input type="submit">
    </form>
@endforeach
</body>
</html>
