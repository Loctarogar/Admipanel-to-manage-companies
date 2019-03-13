<html>
<head>
    <title>Employee Index Page</title>
</head>
<body>
<h2>All Employees</h2>
@foreach($employees as $employee)
    <p>{{ $employee }}</p>
    <form method="post" action="{{ route('employee.destroy', $employee->id) }}">
        @csrf
        @method('delete')
        <input type="submit">
    </form>
@endforeach
</body>
</html>