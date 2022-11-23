@extends('orders.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit Order</h2>
        </div>
        <div class="slo-lg-12 text-center" style="margin-top: 10px;margin-bottom: 10px">
            <a class="btn btn-primary" href="{{ route('orders.index') }}">Back</a>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update',$order->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order Name:</strong>
                    <input type="text" name="order_name" value="{{ $order->order_name }}" class="form-control" placeholder="order name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Email:</strong>
                    <textarea class="form-control" name="order_email" style="height: 150px" placeholder="order email">
                        {{ $order->order_email }}
                    </textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mobile:</strong>
                    <input type="number" name="order_mobile" value="{{ $order->order_mobile }}" class="form-control" placeholder="order mobile">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>san pham:</strong>
                    <input type="text" name="order_sanpham" value="{{ $order->order_sanpham }}" class="form-control" placeholder="order san pham" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>gia tien:</strong>
                    <input type="text" name="order_gt" value="{{ $order->order_gt }}" class="form-control" placeholder="Quantity">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

