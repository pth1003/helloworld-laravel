<html>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}"/>
    <body>
    <h3>Địa chỉ khách hàng</h3>
    @if(count($customers)>0)
        <table class="table table-bordered mt-3 w-25">
            @foreach($customers as $address)
                <tr>
                    <th>
                        {{$address->typeAddress->name_type}}
                    </th>
                    <td>
                        {{$address->address_name}}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h2 class="text-">Khách hàng chưa có địa chỉ</h2>
    @endif
    <a class="btn btn-success" href="{{route('customer.addAdr', ['id'=> $id])}}">Add Address</a>
    <a class="btn btn-dark" href="{{route('customer.index')}}">Back</a>
</html>

