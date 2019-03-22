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
    @if(Auth::user()->id == $company->user_id)
        <form method="post" action="{{ route('company.destroy', $company->id) }}">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
        </form>
    @endif
@endforeach
</body>
</html>
