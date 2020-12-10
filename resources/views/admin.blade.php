@extends('master')
@section('content')
<div class="custom-rental">
    <div class="col-sm-10">
        <div class="trending-wrap">
            <h3>All Orders:</h3>
            @foreach($allOrders as $item)
            <div class="row search-itm cartspace">
                <div class="col-sm-3">
                    <a href="rental/{{$item->id}}">
                        <img class="trending-img" src="{{$item->image}}">
                      </a>
                </div>
                <div class="col-sm-4">
                        <div class="">
                          <h5><b>Customer:</b> {{$item->name}}</h5>
                          <h5><b>Order ID:</b> {{$item->order_id}}</h5>
                          <h5><b>Status:</b> {{$item->status}}</h5>
                          <h5><b>Delivery Address:</b> {{$item->address}}</h5>
                          <h5><b>Payment Status:</b> {{$item->payment_status}}</h5>
                          <h5><b>Payment Method:</b> {{$item->payment_method}}</h5>
                        </div>
                </div>
            </div>
            @endforeach
          </div> 
    </div>
</div>
@endsection