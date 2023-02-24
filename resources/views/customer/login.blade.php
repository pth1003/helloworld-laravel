<html>
<head>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}"/>
</head>
<body class="d-flex justify-content-center flex-column align-items-center">
<h1>Login</h1>
<form method="POST" class="w-25">
    @csrf
    <h3>Username</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter full name" name="cus_username">
    <h3>Pass word</h3>
    <input class="mb-3 form-control" type="password" placeholder="Enter password" name="password">
    <button class="btn btn-success w-100" type="submit">Login</button>
    <p>Nếu bạn chưa có tài khoản </p>
    <a class="btn btn-dark" href="{{route('customer.add')}}">Register</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</form>
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
</body>
</html>