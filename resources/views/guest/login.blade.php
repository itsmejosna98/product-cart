@extends('guest.app')
@section('content')
@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="post" enctype="multipart/form-data" action="loginCheck">
                {{csrf_field()}}
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="username" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" class="form-control p_input">
                  </div>
                  <!-- <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="remember" value="yes" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                
                  <p class="sign-up">Don't have an Account?<a href="{{url('register')}}"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
@endsection