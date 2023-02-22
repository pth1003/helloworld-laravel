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
        <a class="btn btn-success" href="{{route('product.list')}}">Product list</a>
        <a class="btn btn-warning" href="{{route('order.list')}}">Order list</a>
    </div>
    <table class="table table-bordered mt-3 text-center">
        <tr>
            <th>STT</th>
            <th>Full Name</th>
            <th>User name</th>
            <th>Email</th>
            <th>Xem</th>
            <th>Create date</th>
            <th>Update date</th>
            <th>Delete</th>
            <th>Default Address</th>
        </tr>
        @if($listCustomer->getCollection()->count() > 0)
            @foreach($listCustomer as $key => $customer)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $customer->fullname }}</td>
                    <td>{{ $customer->cus_username }}</td>
                    <td>{{ $customer->email }}</td>
                    <td><a href="{{route('customer.address', ['id'=>$customer->id])}}">Xem địa chỉ</a></td>
                    <td>{{ $customer->updated_at }}</td>
                    <td><a onclick="return confirm('delete confirm')" href="{{route('customer.delete', ['id'=>$customer->id])}}">Delete</a></td>
                    <td><a href="{{route('customer.update', ['id'=>$customer->id])}}">Update</a></td>
                    <th>Default Address</th>
                </tr>
            @endforeach
        @endif

    </table>

    <ul class="pagination">
        @if($listCustomer->getCollection()->count() > 0)
            {!! $listCustomer->links() !!}
        @endif
    </ul>
</div>
<script src="{{asset('bootstrap/bootstrap.min.css')}}"></script>
</body>
</html>
