@extends('master')
@section('content')
<div class="custom-rental">
    <div class="col-sm-4">
        <a href="#">Filter</a>
    </div>
    <div class="col-sm-4">
        <div class="trending-wrap">
            <h3>Search Results:</h3>
            @foreach($rentals as $item)
            <div class="search-itm">
              <a href="rental/{{$item['id']}}">
                <img class="trending-img" src="{{$item['image']}}">
                <div class="">
                  <h4>{{$item['name']}}</h4>
                  <h5>{{$item['description']}}</h5>
                </div>
              </a>
            </div>
            @endforeach
          </div> 
    </div>
</div>
@endsection