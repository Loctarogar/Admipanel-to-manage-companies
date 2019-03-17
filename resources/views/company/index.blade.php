<html>
<head>
    <title>
        Company Index page
    </title>
</head>
<body>
@foreach($companies as $company)
    <p>{{ $company }}</p>
    <img src="{{ asset ('storage/app/public/LOW6Fc2TBH8UoexcXLntQkzncXSDN6OsIt7KLbiG.jpeg') }}">
    <form method="post" action="{{ route('company.destroy', $company->id) }}">
        @csrf
        @method('delete')
        <input type="submit">
    </form>
@endforeach
</body>
</html>