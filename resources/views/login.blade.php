@extends('master')
@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="login" method="POST">
                <div class="form-group">
                    @csrf
                  <label for="inputemail">Email address</label>
                  <input type="email" name="email" class="form-control" id="inputemail" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="inputpassword">Password</label>
                  <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection 