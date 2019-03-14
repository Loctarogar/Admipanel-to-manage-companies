<html>
<head>
    <title>Welcome page</title>
</head>
    @if(Auth::guard("web")->check())
        <p>You are logged in as User</p>
    @else
        <p>You are logged out as User</p>
    @endif

    @if(Auth::guard("admin")->check())
        <p>You are logged in as Admin</p>
    @else
        <p>You are logged out as Admin</p>
    @endif
</p>
</html>