<html>
<head>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}"/>
</head>
<body class="d-flex justify-content-center flex-column align-items-center">
<h1>Add address</h1>
<form method="POST">
    <h3> Address</h3>
    <input class="mb-3 form-control" type="text" placeholder="Enter address" name="address">
    <input type="checkbox" value="2" name="type[]"> HomeAddress
    <input type="checkbox" value="3" name="type[]"> Work address
    <button class="btn btn-success" type="submit">Add Address</button>
    <a class="btn btn-dark" href="{{route('customer.index')}}">Back</a>
    @csrf
</form>
</body>
</html>
