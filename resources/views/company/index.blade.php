<html>
<head>
    <title>
        Company Index page
    </title>
</head>
<body>
@foreach($companies as $company)
    <p>{{ $company }}</p>
    <img src="{{ asset('storage/avatars/dlGrrf8OO61RAhk18aMBu8IUbEIfF9pQaGcv9nOy.jpeg') }}">
    <form method="post" action="{{ route('company.destroy', $company->id) }}">
        @csrf
        @method('delete')
        <input type="submit">
    </form>
@endforeach
</body>
</html>