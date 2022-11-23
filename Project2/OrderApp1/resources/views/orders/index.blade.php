@extends('orders.layout')

@section('content')
    <div class="row">
        <div class="col-lg -12">
            <h2 class="text-center">Order Coffee</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('orders.create') }}">Add Order </a>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if (sizeof($orders) > 0)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th> Order name</th>
                <th> email</th>
                <th> mobile</th>
                <th> san pham</th>
                <th> gia tien</th>
                <th width="280px">More</th>
            </tr>
            @foreach( $orders as $order)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{ $order->order_name }}</td>
                    <td>{{ $order->order_email }}</td>
                    <td>{{ $order->order_mobile }}</td>
                    <td>{{ $order->order_sanpham}}</td>
                    <td>{{ $order->order_gt }}</td>
                    <td>
                        <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Start Adding to the  Database.</div>
    @endif
    {!! $orders->links()!!}
@endsection


