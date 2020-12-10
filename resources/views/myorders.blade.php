@extends('master')
@section('content')
<div class="custom-rental">
    <div class="col-sm-10">
        <div class="trending-wrap">
            <h3>My Orders:</h3>
            @foreach($myOrders as $item)
            <div class="row search-itm cartspace">
                <div class="col-sm-3">
                    <a href="rental/{{$item->id}}">
                        <img class="trending-img" src="{{$item->image}}">
                      </a>
                </div>
                <div class="col-sm-4">
                        <div class="">
                          <h4>Order ID: {{$item->order_id}}</h4>
                          <h5>Status: {{$item->status}}</h5>
                          <h5>Address: {{$item->address}}</h5>
                          <h5>Payment Status: {{$item->payment_status}}</h5>
                          <h5>Payment Method: {{$item->payment_method}}</h5>
                          <h5>Delivery Date: {{$item->start_date}}</h5>
                        </div>
                </div>
            </div>
            @endforeach
          </div>
          <div>
            <a class="btn btn-primary" href="{{ URL::to('/myorders/pdf') }}">Export to PDF</a>
          </div>
    </div>
</div>
@endsection