<html>
<head>
    <title>List Customer</title>
    <link rel="stylesheet"  href="{{asset('bootstrap/bootstrap.min.css')}}"/>
    <style>
        td {
            padding: 10px 20px;
        }
        .pagination svg{
            font-size: 20px;
            height: 40px;
            width: 40px;
        }
    </style>
</head>
<body>
    <div class="list_customer">
        <h1>Customer List</h1>
       <a class="btn btn-primary" href="{{route('add')}}">Add customer</a>
        <table class="table">
            <tr>
                <th>STT</th>
                <th>Full Name</th>
                <th>User name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Create date</th>
                <th>Update date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach($customer as $key => $customerValue)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $customerValue->fullname }}</td>
                    <td>{{ $customerValue->cus_username }}</td>
                    <td>{{ $customerValue->email }}</td>
                    <td>{{ $customerValue->address }}</td>
                    <td>{{ $customerValue->created_at }}</td>
                    <td>{{ $customerValue->updated_at }}</td>
                    <td><a onclick="return confirm('delete confirm')" href="{{route('delete', ['id'=>$customerValue->id])}}">Delete</a></td>
                    <td><a href="{{route('updateCus', ['id'=>$customerValue->id])}}">Update</a></td>
                </tr>
            @endforeach
        </table>
            <ul class="pagination">
               {!! $customer->links() !!}
            </ul>
    </div>
<script src="{{asset('bootstrap/bootstrap.min.css')}}"></script>
</body>
</html>
