@extends('master')
@section('content')
<div class="custom-rental">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators my-4">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      @foreach($rentals as $item)
      <div class="item {{$item['id']==3?'active':''}}">
        <a href="rental/{{$item['id']}}">
          <img class="slider-img" src="{{$item['image']}}">
          <div class="carousel-caption">
            <h2>{{$item['name']}}</h2>
            <p>{{$item['description']}}</p>
          </div>
        </a>
      </div>
    @endforeach
    </div> 

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="trending-wrap">
    <h3>All Available Bounce Houses</h3>
    @foreach($rentals as $item)
    <div class="trending-itm">
      <a href="rental/{{$item['id']}}">
        <img class="trending-img" src="{{$item['image']}}">
        <div class="">
          <h4>{{$item['name']}}</h4>
        </div>
      </a>
    </div>
    @endforeach
  </div> 
</div>
@endsection