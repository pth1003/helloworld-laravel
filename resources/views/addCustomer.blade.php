<html>
<body>
<h1>Add customer</h1>
<form method="POST">
    <h3>Full name</h3>
    <input type="text" placeholder="Enter full name" name="fullname">

    <h3>User name</h3>
    <input type="text" placeholder="Enter user name" name="cus_username">

    <h3>Email</h3>
    <input type="text" placeholder="Enter email" name="email">

    <h3>Pass word</h3>
    <input type="password" placeholder="Enter password" name="password">

    <h3>Address</h3>
    <input type="text" placeholder="Enter address" name="address">

    <button type="submit">Add customer</button>
    <button><a href="{{route('index')}}">Back</a></button>
    @csrf
</form>
</body>
</html>
