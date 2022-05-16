@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
                    <div class="input_field"> <span><i class="bx bxs-envelope"></i></span>
                      <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input_field"> <span><i class="bx bxs-lock-alt"></i></span>
                      <input type="password" name="password" placeholder="Password" required />
                    </div>
                    
                      <div class="input_field checkbox_option">
                          <input type="checkbox" id="cb1">
                          <label for="cb1">Remember me</label>
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