@extends('frontend.layouts.template')

@section('maincontent')

<h1>Provide Your Shipping Information</h1>
<div class="row">
    <div class="col-12">
     <div class="box_main">
        <form action="{{route('addaddress')}}" method="POST">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">Phone Number</label>
              <input type="number" name="phone_number" class="form-control" id="exampleInputEmail1">

            </div>
            <div class="form-group">
              <label for="address_name" class="form-label">City/Village</label>
              <input type="text" name="address_name" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Postal Code</label>
                <input type="text" name="postal_code" class="form-control">
              </div>

            <button type="submit" class="btn btn-primary">Next</button>
          </form>

     </div>
    </div>
</div>

@endsection