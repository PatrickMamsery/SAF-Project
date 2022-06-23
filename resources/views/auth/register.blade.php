@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="form_wrapper">
            <div class="form_container">
              <div class="title_container">
                <h2>Register</h2>
              </div>
              <div class="row clearfix">
                <div class="">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row clearfix">
                      <div class="col_half">
                        <div class="input_field"> <span><i class="bx bxs-user"></i></span>
                          <input type="text" name="fname" placeholder="First Name" />
                        </div>
                      </div>
                      <div class="col_half">
                        <div class="input_field"> <span><i class="bx bxs-user"></i></span>
                          <input type="text" name="sname" placeholder="Surname" required />
                        </div>
                      </div>
                    </div>
                    <div class="input_field"> <span><i class="bx bxs-envelope"></i></span>
                      <input type="email" name="email" placeholder="Email" required />
                    </div>

                    <div class="input_field"> <span><i class="bx bxs-phone"></i></span>
                      <input type="phone" name="phone" placeholder="Phone Number" onkeyup="validatePhoneNumber(this.value)" required />
                    </div>

                    <div id="phone_error" class="error hidden">Please enter a valid phone number</div>

                    <div class="input_field"> <span><i class="bx bxs-lock-alt"></i></span>
                      <input type="password" name="password" placeholder="Password" id="pwd" required />
                    </div>
                    <div class="input_field"><span><i class="bx bxs-lock-alt"></i></span>
                      <input type="password" name="password_confirmation" placeholder="Re-type Password" onkeyup="checkPassword(this.value)" required />
                    </div>

                    <div id="password_error" class="error hidden">Passwords do not match</div>
                    
                        <div class="input_field radio_option">
                          <input type="radio" name="gender" id="rd1" value="male">
                          <label for="rd1">Male</label>
                          <input type="radio" name="gender" id="rd2" value="female">
                          <label for="rd2">Female</label>
                        </div>
                        
                      <div class="input_field checkbox_option">
                          <input type="checkbox" id="cb1">
                          <label for="cb1">I agree with terms and conditions</label>
                      </div>
                    <input class="button" type="submit" value="Register" />
                  </form>
                </div>
              </div>
            </div>
          </div>
          <p class="credit"></p>
    </div>
@endsection