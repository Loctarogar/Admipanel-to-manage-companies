<html>
<head>
    <title>Edit Company</title>
</head>
<body>
<h2>Edit Company</h2>
<form method="post" action="{{ route('company.update', $company->id) }}">
    @csrf
    @method('PATCH')
    Name: <br>
    <input name="name" type="text" value="{{ $company->name }}"><br>
    Email : <br>
    <input name="email" type="email" value="{{ $company->email }}"><br>
    Logo: <br>
    <input name="logo" type="text" value="{{ $company->logo }}"><br>
    Website: <br>
    <input name="website" type="text" value="{{ $company->website }}"><br>
    <input type="submit">
</form>
</body>
</html>