@extends('dashboard.layout.master')

@section('title','Login')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('user-login')}}" method="post" class="fm_register" enctype="multipart/form-data">
                    @csrf
                    <H1>LOGIN</H1>
                    <div class="noti-register">
                        <h2 class="msg_error">@php if(isset($msg_error)) echo $msg_error; @endphp</h2>
                        <h2 class="msg_success">@php if(isset($kq)) echo $kq; @endphp</h2>
                        <h2 class="msg_success">@php if(isset($tk)) echo $tk; @endphp</h2>
                        <h2 class="msg_success">@php if(isset($mk)) echo $mk; @endphp</h2>
                    </div>
                    <hr>

                    <label for="username">Email:</label> <br>
                    <input type="mail" name="username" id="username" placeholder="Enter your username..." required>

                    <label for="password">Password:</label> <br>
                    <input type="password" name="password" id="password" placeholder="Enter your username..." minlength="6" title="Password must be between 6-16 characters" maxlength="16" required>

                    <div class="confirm-register">
                        <div class="register-left">
                            <button type="submit">Login</button>
                        </div>
                        <div class="register-right">
                            <a href="/register"><u>Click here, if you don't have an account!</u></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection