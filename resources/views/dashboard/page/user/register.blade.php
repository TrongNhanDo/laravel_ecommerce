@extends('dashboard.layout.master')

@section('title','Register')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 div_re">
                <H1 style="text-align: center;">REGISTER</H1>
                <hr>
                <label for="fullname">Fullname:</label> <br>
                <input class='form form-control' type="text" name="fullname" id="fullname" placeholder="Enter your name..." required>

                <label for="email">Email:</label> <br>
                <input class='form form-control' type="mail" name="email" id="email" placeholder="Enter your username..." required>

                <label for="phone">Phone:</label> <br>
                <input class='form form-control' type="text" name="phone" id="phone" placeholder="Enter your username..." maxlength="10" required>

                <label for="">Address:</label> <br>
                <textarea class='form form-control' name="address" id="address" cols="30" rows="3" placeholder="Enter your address..."></textarea>

                <label for="password">Password:</label> <br>
                <input class='form form-control' type="password" name="password" id="password" placeholder="Enter your username..." minlength="6" title="Password must be between 6-16 characters" maxlength="16" required>

                <label for="re-password">Re-password:</label> <br>
                <input class='form form-control' type="password" name="re-password" id="re-password" placeholder="Enter your username..." minlength="6" maxlength="16" required oninput="checkPass()">
                <span id="checkPass" style="color: red"></span> <br> <br>
                <script>
                    function checkPass(){
                        var pass1 = document.getElementById('password').value
                        var pass2 = document.getElementById('re-password').value
                        if(pass1!= pass2){
                            document.getElementById("checkPass").innerHTML = "Confirm password incorrect!"
                            document.getElementById("btnregister").style.display = 'none';
                        }else{
                            document.getElementById("checkPass").innerHTML = "";
                            document.getElementById("btnregister").style.display = 'block';
                        }
                    }
                </script>
                <div class="confirm-register">
                    <div class="register-left">
                        <button class="btn btn-primary register" type="submit" id="btnregister">Register</button>
                    </div>
                    <div class="register-right">
                        <a href="/login"><u>Already have an account!</u></a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<style>
    .div_re{
        border: 1px solid black;
        padding: 20px 30px
    }
    .div_re input{
        margin-bottom: 20px;
    }
</style>
<script>
    const _token = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
        $(document).on('click','.register',function(e){
            e.preventDefault();
            let fullname = $("#fullname").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let address = $("#address").val();
            let password = $("#password").val();
            if(fullname!=''&&email!=''&&phone!=''&&address!=''&&password!=''){
                $.ajax({
                    type: 'post',
                    url: '/register',
                    dataType: 'json',
                    data: {
                        fullname: fullname,
                        email: email,
                        phone: phone,
                        address: address,
                        password: password,
                        _token:_token
                    },
                    success: function(data){
                        if(data==1){
                            alert('Register Success');
                            location.href = './login';
                        }else if(data==2){
                            alert("Email already exist");
                        }else{
                            alert("Register fail");
                        }
                    }
                });
            }else{
                alert("Please enter all information");
            }
        })
    });
</script>
@endsection