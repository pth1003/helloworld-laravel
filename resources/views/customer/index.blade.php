<html>
<head>
    <title>List Customer</title>
{{--    <link rel="stylesheet"  href="{{asset('bootstrap/bootstrap.min.css')}}"/>--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <h3>Xin chao: {{Auth::guard('customer')->user()->fullname}}</h3>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Customer List</h1>
        <a class="btn btn-sm btn-warning" href="{{route('customer.logout')}}">Logout</a>
    </div>

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
            <th>Default Address</th>
            <th>Create date</th>
            <th>Action</th>
            <th>More</th>
        </tr>
        @if($listCustomer->count() > 0)
            @foreach($listCustomer as $key => $customer)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $customer->fullname }}</td>
                    <td>{{ $customer->cus_username }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->defaultAddress }}</td>
                    <td>{{ $customer->updated_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('customer.update', ['id'=>$customer->id])}}">Update</a>
                                <a onclick="return confirm('Confirm delete user?')" class="dropdown-item" href="{{route('customer.delete', ['id'=>$customer->id])}}">Delete</a>
                            </div>
                        </div>
                    </td>
                    <td><a href="{{route('customer.address', ['id'=>$customer->id])}}">More</a></td>
                </tr>
            @endforeach
        @endif

    </table>

    <ul class="pagination">
        @if($listCustomer->count() > 0)
            {!! $listCustomer->links() !!}
        @endif
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
