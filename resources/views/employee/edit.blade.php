<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
<form method="post" action="{{ route('employee.update', $employee->id) }}">
    @csrf
    @method('PATCH')
    <p>{{ $employee->id }}</p>
    First name: <br>
    <input name="firstname" type="text" value="{{ $employee->firstname }}"><br>
    Last name: <br>
    <input name="lastname" type="text" value="{{ $employee->lastname }}"><br>
    Company: <br>
    <input name="company" type="text" value="{{ $employee->company }}"><br>
    Email: <br>
    <input name="email" type="text" value="{{ $employee->email }}"><br>
    Phone: <br>
    <input name="phone" type="number" value="{{ $employee->phone }}"><br>
    <input type="submit">
</form>
</body>
</html>