@extends('guest.app')
@section('content')
<!-- @if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$errors}}</li>
    @endforeach
  </ul>
</div>
@endif -->
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
  <div class="card col-lg-7 mx-auto">
    <div class="card-body px-5 py-5">
      <h3 class="card-title text-left mb-3">Register</h3>
      <form id="validateForm" method="post" enctype="multipart/form-data" onsubmit="return validate();" action="{{url('user')}}">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-6 form-group">
            <label>First Name</label>
            <input type="text" name="firstName" value="{{old('firstName')}}" placeholder="Enter your first name" class="form-control p_input">
            @if ($errors->has('firstName'))
            <span class="help-block">
              <small style="color: red;">{{ $errors->first('firstName') }}</small>
            </span>
            @endif
          </div>
          <div class="col-md-6 form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" value="{{old('lastName')}}" placeholder="Enter your last name" class="form-control p_input">
            @if ($errors->has('lastName'))
            <span class="help-block">
              <small style="color: red;">{{ $errors->first('lastName') }}</small>
            </span>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="exampleSelectGender">Gender</label>
            <select class="form-control" value="{{old('gender')}}" name="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="col-md-6 form-group">
            <label>Phone Number</label>
            <input type="text" value="{{old('phoneNumber')}}" name="phoneNumber" placeholder="Phone Number" class="form-control p_input">
            @if ($errors->has('phoneNumber'))
            <span class="help-block">
              <small style="color: red;">{{ $errors->first('phoneNumber') }}</small>
            </span>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Delivery Address</label>
            <textarea type="text" id="deliveryAddress" value="{{old('deliveryAddress')}}" name="deliveryAddress" placeholder="Delivery Address" class="form-control p_input"></textarea>
            @if ($errors->has('deliveryAddress'))
            <span class="help-block">
              <small style="color: red;">{{ $errors->first('deliveryAddress') }}</small>
            </span>
            @endif
          </div>

          <div class="col-md-6 form-check">
            <label class="form-check-label">
              <input type="checkbox" value="{{old('checkbox')}}" name="checkbox" id="isChecked" class="form-check-input">Billing address same as delivery address</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Billing Address</label>
            <textarea type="text" id="billingAddress" value="{{old('billingAddress')}}" name="billingAddress" placeholder="Billing Address" class="form-control p_input"></textarea>
            @if ($errors->has('billingAddress'))
            <span class="help-block">
              <small style="color: red;">{{ $errors->first('billingAddress') }}</small>
            </span>
            @endif
          </div>
          <div class="col-md-6 form-group">
            <label>Email Address</label>
            <input type="email" name="emailAddress" value="{{old('emailAddress')}}" placeholder="Email Address" class="form-control p_input">
            @if ($errors->has('emailAddress'))
            <span class="help-block">
              <small style="color: red;">{{ $errors->first('emailAddress') }}</small>
            </span>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Password" class="form-control p_input">
            @if ($errors->has('password'))
            <span class="help-block">
              <small style="color: red;">{{ $errors->first('password') }}</small>
            </span>
            @endif
          </div>
          <div class="col-md-6 form-group">
            <label>Confirm Password</label>
            <input onkeyup="check(this)" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="form-control p_input">
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
        </div>
        <p class="sign-up text-center">Already have an Account?<a href="{{url('/')}}"> Log In</a></p>
      </form>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
  $(document).ready(function() {
    $('#isChecked').change(function() {
      if ($(this).prop('checked')) {
        $('#billingAddress').val($('#deliveryAddress').val());
      } else {
        $('#billingAddress').val("");
      }
    });
    
  });
  
</script>
<!-- <script type="text/javascript">
  jQuery('.validateForm').validate({
      rules: {
        password: {
          minlength: 3
        },
        confirmPassword: {
          required: true,
          minlength: 3,
          equalTo: '#password'
        },
        messages: {
          confirmPassword: {
            equalTo: 'password and confirm password is mismatch'
          }
        }

      }
    });
</script>
<script type="text/javascript">
  var password = document.getElementById('password');

  function check(elem) {
    if (elem.value.length > 0) {
      if (elem.value != password.value) {
        document.getElementById('alert').innerText = "Confirm password does not match";
      } else {
        document.getElementById('alert').innerText = "";
      }
    } else {
      document.getElementById('alert').innerText = "Please enter password";
    }
  }
</script> -->

@endsection