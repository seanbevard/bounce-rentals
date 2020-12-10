@extends('master')
@section('content')
<div class="custom-rental">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
              <tr>
                <td>Order Details</td>
                <td>${{$orderTotal}}</td>
              </tr>
              <tr>
                <td>Delivery Charge (Applies if outside of delivery range)</td>
                <td>$?</td>
              </tr>
              <tr>
                <td>Order Total</td>
                <td>${{$orderTotal}}</td>
              </tr>
            </tbody>
        </table>  
        <div>
            <form action="/submitorder" method="POST">
                @csrf
                <div class="form-group">
                  <textarea name="address" placeholder="Delivery Address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="method">Payment Method:</label>
                    <br>
                    <input type="radio" name="paymentmethod" value="COD"> 
                    <span>Credit Card</span>
                    <br>
                    <input type="radio" name="paymentmethod" value="COD">
                    <span>Paypal</span>
                    <br>
                    <input type="radio" name="paymentmethod" value="COD">
                    <span>(Zelle / CashApp / Vemo / Cash) on Delivery</span>
                </div>
                <button type="submit" class="btn btn-default">Place Order</button>
              </form>
        </div>
    </div>
</div>
@endsection 