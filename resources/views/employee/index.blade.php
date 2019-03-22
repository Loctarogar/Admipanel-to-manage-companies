<html>
<head>
    <title>Employee Index Page</title>
</head>
<body>
<h2>All Employees</h2>
@foreach($employees as $employee)
    <p>{{ $employee }}</p>
    @if(Auth::user()->id == $employee->id)
    <form method="post" action="{{ route('employee.destroy', $employee->id) }}">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
    </form>
    @endif
@endforeach
</body>
</html>