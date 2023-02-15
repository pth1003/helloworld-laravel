<html>
<body>
<h1>Update customer</h1>
<form method="POST">
    @foreach($dataUpdate as $key => $data)
    <h3>Full name</h3>
    <input type="text" placeholder="Enter full name" name="fullname" value="{{$data->fullname}}">

    <h3>User name</h3>
    <input type="text" placeholder="Enter user name" name="cus_username" value="{{$data->cus_username}}">

    <h3>Email</h3>
    <input type="text" placeholder="Enter email" name="email" value="{{$data->email}}">

    <h3>Address</h3>
    <input type="text" placeholder="Enter address"  name="address" value="{{$data->address}}">
    @endforeach
    <button type="submit">Update customer</button>
    <button><a href="{{route('index')}}">Back</a></button>
    @csrf
</form>
</body>
</html>
