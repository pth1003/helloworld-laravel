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
        <a class="btn btn-warning" href="{{route('customer.order')}}">Order list</a>
    </div>
    <table class="text-center">
        <tr>
            <th>Product id</th>
            <th>Name</th>
            <th>Quantiy</th>
            <th>Price</th>

        </tr>
        @foreach($listProduct as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}$</td>
            </tr>
        @endforeach
    </table>
    <ul class="pagination">
        {!! $product->paginate() !!}

    </ul>
</div>
<script src="{{asset('bootstrap/bootstrap.min.css')}}"></script>
</body>
</html>
