@extends('master')
@section('content')
<div class="custom-rental">
    <div class="col-sm-10">
        <div class="trending-wrap">
            <h3>Cart List:</h3>
            @if (session('status'))
            test
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @foreach($rentals as $item)
            <div class="row search-itm cartspace">
                <div class="col-sm-3">
                    <a href="rental/{{$item->id}}">
                        <img class="trending-img" src="{{$item->image}}">
                      </a>
                </div>
                <div class="col-sm-4">
                        <div class="">
                          <h4>{{$item->name}}</h4>
                          <h5>{{$item->description}}</h5>
                          <h5>Dropoff Date: {{ \Carbon\Carbon::parse($item->start_date)->format('m/d/Y')}}</h5>
                        </div>
                </div>
                <div class="col-sm-6">
                    <a href="/remove/{{$item->cart_id}}" class="btn btn-warning">Remove</a>
                </div>
            </div>
            @endforeach
            <br>
            <a class="btn btn-success" href="order">Place Order</a>
          </div> 
    </div>
</div>
@endsection