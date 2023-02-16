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
    <div class="d-flex justify-content-around w-25">
        <a class="btn btn-primary" href="{{route('customer.add')}}">Add customer</a>
        <a class="btn btn-success" href="{{route('customer.product')}}">Product list</a>
        <a class="btn btn-warning" href="{{route('customer.order')}}">Order list</a>
    </div>
    <table>
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
        @foreach($listCustomer as $key => $customer)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $customer->fullname }}</td>
                <td>{{ $customer->cus_username }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>{{ $customer->updated_at }}</td>
                <td><a onclick="return confirm('delete confirm')" href="{{route('delete', ['id'=>$customer->id])}}">Delete</a></td>
                <td><a href="{{route('updateCus', ['id'=>$customer->id])}}">Update</a></td>
            </tr>
        @endforeach
    </table>

    <ul class="pagination">
        {!! $customer->paginate() !!}
    </ul>
</div>
<script src="{{asset('bootstrap/bootstrap.min.css')}}"></script>
</body>
</html>
