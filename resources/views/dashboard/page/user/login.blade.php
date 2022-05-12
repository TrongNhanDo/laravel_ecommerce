@extends('dashboard.layout.master')

@section('title','Login')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="border: 1px solid black; padding: 30px">
                    <H1 style="text-align: center;">LOGIN</H1>
                    <hr>

                    <label for="username">Email:</label> <br>
                    <input class="form form-control" type="mail" name="username" id="username" placeholder="Enter your username..." required style="margin-bottom: 30px">

                    <label for="password">Password:</label> <br>
                    <input class="form form-control" type="password" name="password" id="password" placeholder="Enter your username..." minlength="6" title="Password must be between 6-16 characters" maxlength="16" required>

                    <div class="confirm-register" style="margin-top: 30px;">
                        <div class="register-left">
                            <button class="btn btn-primary login" type="submit" style="width: 200px;">Login</button>
                        </div>
                        <div class="register-right">
                            <a href="/register"><u>Click here, if you don't have an account!</u></a>
                        </div>
                    </div>
                    <script>
                        const _token = $('meta[name="csrf-token"]').attr('content');
                        $(document).ready(function(){
                            $(document).on('click','.login',function(e){
                                e.preventDefault();
                                let username = $("#username").val();
                                let password = $("#password").val();
                                if(username != '' && password != ''){
                                    $.ajax({
                                        type: 'post',
                                        url: '/login',
                                        dataType: 'json',
                                        data: {
                                            username : username,
                                            password: password,
                                            _token:_token
                                        },
                                        success: function(data){
                                            if(data==1){
                                                alert("Login succes!");
                                                location.href = './';
                                            }else if(data==2){
                                                alert("Username hasn't exist");
                                                $("#username").focus();
                                            }else{
                                                alert("Username or password are wrong!");
                                                $("#username").focus();
                                            }
                                        }
                                    });
                                }else{
                                    if(username==''){
                                        alert("Please enter the username");
                                    }else{
                                        alert("Please enter the password");
                                    }
                                }
                            });
                        });
                    </script>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection