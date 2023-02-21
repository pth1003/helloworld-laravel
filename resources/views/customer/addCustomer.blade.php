<html>
<head>
    <link rel="stylesheet"  href="{{asset('bootstrap/bootstrap.min.css')}}"/>
</head>
<body class="d-flex justify-content-center flex-column align-items-center">
<h1>Add customer</h1>
<form method="POST">
    <h3>Full name</h3>
    <input class="mb-3" type="text" placeholder="Enter full name" name="fullname">

    <h3>User name</h3>
    <input class="mb-3" type="text" placeholder="Enter user name" name="cus_username">

    <h3>Email</h3>
    <input class="mb-3" type="text" placeholder="Enter email" name="email">

    <h3>Pass word</h3>
    <input class="mb-3" type="password" placeholder="Enter password" name="password">

{{--    <h3>Default Address</h3>--}}
{{--    <input class="mb-3" type="text" placeholder="Enter address" name="address">--}}

{{--    <h3>Home address</h3>--}}
{{--    <input class="mb-3" type="text" placeholder="Enter address" name="address">--}}

{{--    <h3>Company Address</h3>--}}
{{--    <input class="mb-3" type="text" placeholder="Enter address" name="address">--}}

    <button class="btn btn-success" type="submit">Add customer</button>
    <a class="btn btn-dark" href="{{route('customer.index')}}">Back</a>
    @csrf
</form>
</body>
</html>
