<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
<form method="post" action="{{ route('employee.update', $employee->id) }}">
    @csrf
    @method('patch')
    <p>{{ $employee->id }}</p>
    First name: <br>
    <input name="firstname" type="text" value="{{ $employee->firstname }}"><br>
    Last name: <br>
    <input name="lastname" type="text" value="{{ $employee->lastname }}"><br>

    <input type="submit">
</form>
</body>
</html>