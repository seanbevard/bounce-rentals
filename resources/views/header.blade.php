<?php
use App\Http\Controllers\RentalController;
$total = 0;
if(Session::has('user')){
  $total = RentalController::cartCount();
}
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Orlando Bounce Houses</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/cart">Cart({{$total}})</a></li>
          @if(Session::has('user'))
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/logout">Logout</a></li>
              <li><a href="/admin">Admin Panel</a></li>
            </ul>
          </li>
          @else
          <li><a href="/login ">Login</a></li>
          <li><a href="/register ">Register</a></li>
          @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class=""><a href="/myorders">Order History</a></li>
        </ul>
        <form action="/search" class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" name="query" class="form-control search" placeholder="Search Inventory">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>