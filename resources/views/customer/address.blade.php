<html>
<link rel="stylesheet"  href="{{asset('bootstrap/bootstrap.min.css')}}"/>
<body>
    <h3>Địa chỉ khách hàng</h3>
    @if(count($customers)>0)
        @foreach($customers as $address)
            <table class="table table-bordered mt-3">
                <tr>
                    {{$address->address_name}}
                    <br>
                    {{$address->typeAddress->name_type}}
                </tr>
            </table>
        @endforeach
    @else
        <h2 class="text-">Khách hàng chưa có địa chỉ</h2>
    @endif
</body>
</html>

