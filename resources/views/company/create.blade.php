<html>
<head>
    <title>
        Company Create Page
    </title>
</head>
<body>
<form method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
    @csrf
    Name: <br>
    <input name="name" type="text"><br>
    Email : <br>
    <input name="email" type="email"><br>
    Logo: <br>
    <input name="logo" type="file"><br>
    Website: <br>
    <input name="website" type="text"><br>
    <input type="submit">
</form>
</body>
</html>