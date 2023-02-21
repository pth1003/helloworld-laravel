<html>
<head>
    <title>Order List</title>
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
        <a class="btn btn-success" href="{{route('customer.index')}}">Customer list</a>
        <a class="btn btn-warning" href="{{route('order.list')}}">Order list</a>
    </div>
    <table class="text-center w-25">
        <tr>
{{--            <th>Order id</th>--}}
            <th>Customer name</th>
            <th>Product Name</th>

        </tr>
        @foreach($arrOrder as $key=>$order)
            <tr>
{{--                <td>{{ $product[0] }}</td>--}}
                <td>{{ $order[0]}}</td>
                <td>{{ $order[1]}}</td>
            </tr>
        @endforeach
    </table>
    <ul class="pagination">
{{--        {!! $listOrder->links() !!}--}}

    </ul>
</div>
<script src="{{asset('bootstrap/bootstrap.min.css')}}"></script>
</body>
</html>
