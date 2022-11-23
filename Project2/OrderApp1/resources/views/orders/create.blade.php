@extends('orders.layout')

@section('content')
    <div class="row">
        <div class="col -lg-12">
            <h2 class="text-center"> Add Order</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('orders.index') }}">Back</a>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors-> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}"method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-ms-12 col-md-12">
                <div class="form-group">
                    <strong>Order Name:</strong>
                    <input type="text" name="order_name" class="form-control" placeholder="order name">
                </div>
            </div>

            <div class="col-xs-12 col-ms-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <textarea  class="form-control" style="height: 150px" name="order_email" placeholder="order email"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-ms-12 col-md-12">
                <div class="form-group">
                    <strong>Mobile</strong>
                    <input type="number" name="order_mobile" class="form-control" placeholder="order mobile">
                </div>
            </div>
            <div class="col-xs-12 col-ms-12 col-md-12">
                <div class="form-group">
                    <strong>sam pham </strong>
                    <input type="text" name="order_sanpham" class="form-control" placeholder="order san pham">
                </div>
            </div>

            <div class="col-xs-12 col-ms-12 col-md-12">
                <div class="form-group">
                    <strong>gia tien </strong>
                    <input type="text" name="order_gt" class="form-control" placeholder="Quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text center">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    </form>
@endsection

