<html>
<head>
    <title>Product List</title>
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
    <table class="text-center table-bordered mt-3">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Quantiy</th>
            <th>Price</th>

        </tr>
        @foreach($listProduct as $key => $product)
            <tr>
                <td>{{ ++$key}}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}$</td>
            </tr>
        @endforeach
    </table>
    <ul class="pagination">
        {!! $listProduct->links() !!}

    </ul>
</div>
<script src="{{asset('bootstrap/bootstrap.min.css')}}"></script>
</body>
</html>
