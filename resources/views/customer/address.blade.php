<html>
<link rel="stylesheet"  href="{{asset('bootstrap/bootstrap.min.css')}}"/>
<body>
    <h3>Địa chỉ khách hàng</h3>
    @foreach($customer as $address)
        <table class="table table-bordered mt-3">
            <tr>
                {{$address->address_name}}
            </tr>
        </table>
    @endforeach
</body>
</html>

