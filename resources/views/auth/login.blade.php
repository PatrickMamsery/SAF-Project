@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="/css/register.css">
<link rel="stylesheet" href="/css/gallery.css">
@endsection

@section('content')
    <div class="container">
        <div class="form_wrapper">
            <div class="form_container">
              <div class="title_container">
                <h2>Login</h2>
              </div>
              <div class="row clearfix" style="justify-content: center">
                <div class="">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input_field"> <span><i class="material-icons">email</i></span>
                      <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input_field"> <span><i class="material-icons">lock</i></span>
                      <input type="password" name="password" placeholder="Password" required />
                    </div>
                    
                      <div class="input_field checkbox_option">
                          <input type="checkbox" id="cb1">
                          <label for="cb1">I agree with terms and conditions</label>
                      </div>
                    <input class="button" type="submit" value="Login" />
                  </form>
                </div>
              </div>
            </div>
          </div>
          <p class="credit"></p>
    </div>
@endsection