<html>
<head>
    <title>Create new Employee</title>
</head>
<body>
<form method="post" action="{{ route('employee.store') }}">
    @csrf
    First name: <br>
    <input name="firstname" type="text"><br>
    Last name: <br>
    <input name="lastname" type="text"><br>
    Company: <br>
    <input name="company" type="text"><br>
    Email: <br>
    <input name="email" type="text"><br>
    Phone: <br>
    <input name="phone" type="number"><br>
    <input type="submit">
</form>
</body>
</html>