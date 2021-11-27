@extends('layouts.app')

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
                        <div class="input_field"> <span><i class="material-icons">person</i></span>
                          <input type="text" name="fname" placeholder="First Name" />
                        </div>
                      </div>
                      <div class="col_half">
                        <div class="input_field"> <span><i class="material-icons">person</i></span>
                          <input type="text" name="sname" placeholder="Surname" required />
                        </div>
                      </div>
                    </div>
                    <div class="input_field"> <span><i class="material-icons">email</i></span>
                      <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input_field"> <span><i class="material-icons">phone</i></span>
                      <input type="phone" name="phone" placeholder="Phone Number" required />
                    </div>
                    <div class="input_field"> <span><i class="material-icons">lock</i></span>
                      <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="input_field"><span><i class="material-icons">lock</i></span>
                      <input type="password" name="password_confirmation" placeholder="Re-type Password" required />
                    </div>
                    
                          <div class="input_field radio_option">
                        <input type="radio" name="radiogroup1" id="rd1">
                        <label for="rd1">Male</label>
                        <input type="radio" name="radiogroup1" id="rd2">
                        <label for="rd2">Female</label>
                        </div>
                        <div class="input_field select_option">
                          <select>
                            <option>Select a country</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                          </select>
                          <div class="select_arrow"></div>
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