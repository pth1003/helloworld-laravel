<html>
<head>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}"/>
</head>
<body class="d-flex justify-content-center flex-column align-items-center">
<h1>Add customer</h1>
<form method="POST">
    <h3>Full name</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter full name" name="fullname">

    <h3>User name</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter user name" name="cus_username">

    <h3>Email</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter email" name="email">

    <h3>Pass word</h3>
    <input class="mb-3 form-control" type="password" placeholder="Enter password" name="password">


    <h3> address</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter address" name="address">
    @foreach($typeAddress as $index => $type)

        <input type="checkbox" name="typeAdd[]" value="{{$type->id}}" @if($index==1) checked @endif > {{$type->name_type}}

    @endforeach
    {{--    <h3>Work Address</h3>--}}
    {{--    <input class="mb-3 form-control" type="text" placeholder="Enter address" name="WorkAddress">--}}

    <button class="btn btn-success" type="submit">Add customer</button>
    <a class="btn btn-dark" href="{{route('customer.index')}}">Back</a>
    @csrf
</form>
</body>
</html>
