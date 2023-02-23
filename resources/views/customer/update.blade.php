<html>
<head>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}"/>
</head>
<body class="d-flex justify-content-center flex-column align-items-center">
<h1>Update customer</h1>
<form method="POST" class="w-25">
    <h3>Full name</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter full name" name="fullname"
           value="{{ $customer['fullname'] }}">

    <h3>User name</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter user name" name="cus_username"
           value="{{ $customer['cus_username'] }}">

    <h3>Email</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter email" name="email"
           value="{{ $customer['email'] }}">
    @foreach($address as $key=>$add_ress)
        <h3>{{$add_ress->typeAddress->name_type}}</h3>
        <input class="mb-3 form-control" type="text" placeholder="Enter address" name="{{$add_ress->typeAddress->id}}"
               value="{{$add_ress->address_name}}">
    @endforeach
    <br >
    <button class="btn btn-success" type="submit">Update customer</button>
    <a class="btn btn-dark" href="{{route('customer.index')}}">Back</a>
    @csrf
</form>
</body>
</html>
