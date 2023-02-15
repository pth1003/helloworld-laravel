<html>
<head>
    <title>List Customer</title>
    <style>
        td {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="list_customer">
        <h1>Customer List</h1>
        <button><a href="{{route('add')}}">Add customer</a></button>
        <table>
            <tr>
                <th>STT</th>
                <th>Full Name</th>
                <th>User name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Create date</th>
                <th>Delete</th>
            </tr>
            @foreach($customerList as $key => $customerValue)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $customerValue->fullname }}</td>
                    <td>{{ $customerValue->cus_username }}</td>
                    <td>{{ $customerValue->email }}</td>
                    <td>{{ $customerValue->address }}</td>
                    <td>{{ $customerValue->created_at }}</td>
                    <td>Del</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
