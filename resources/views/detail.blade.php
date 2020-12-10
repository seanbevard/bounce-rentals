@extends('master')
@section('content')
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
<div class="container">
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="start_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
       clearBtn: true,
      };
      date_input.datepicker(options);
    })
    $(document).ready(function(){
      var date_input=$('input[name="end_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
       clearBtn: true,
      };
      date_input.datepicker(options);
    })
</script>

    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$rental['image']}}">
        </div>
        <div class="col-sm-6">
            <a href="/">Home</a>
            <h2>{{$rental['name']}}</h2>
            <h3>Weekday Price: ${{$rental['weekday_price']}} Daily</h3>
            <h3>Weekend Price: ${{$rental['weekend_price']}} Daily</h3>
            <h4>Description: {{$rental['description']}}</h4>
            <br>
            <br>
            <div class="bootstrap-iso">
            <div class="container-fluid">
            <form action="/add" method="POST">
                @csrf
                <input  type="hidden" name="rental_id" value="{{$rental['id']}}">
                <div class="form-group ">
                    <label class="control-label requiredField" for="start_date">
                     Select Date
                     <span class="asteriskField">
                      *
                     </span>
                    </label>
                    <div class="input-group">
                     <div class="input-group-addon">
                      <i class="fa fa-calendar">
                      </i>
                     </div>
                     <input class="form-control" id="start_date" name="start_date" placeholder="MM/DD/YYYY" type="text"/>
                    </div>
                   </div>
                   <div class="form-group">
                    <div>
                     <button class="btn btn-primary " name="submit" type="submit">
                      Submit
                     </button>
                    </div>
                   </div>
            </form>
            </div>
            </div>
            <br>
            <br>
        </div>
    </div>

</div>
@endsection