@extends('dashboard.layout.master')

@section('title','Register')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('register')}}" method="post" class="fm_register" enctype="multipart/form-data">
                    @csrf
                    <H1>REGISTER</H1>
                    <div class="noti-register">
                        <h2 class="msg_error">@php if(isset($msg_error)) echo $msg_error; @endphp</h2>
                        <h2 class="msg_success">@php if(isset($msg_success)) echo $msg_success; @endphp</h2>
                    </div>
                    <hr>
                    <label for="fullname">Fullname:</label> <br>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter your name..." required>

                    <label for="email">Email:</label> <br>
                    <input type="mail" name="email" id="email" placeholder="Enter your username..." required>

                    <label for="image">Image:</label> <br>
                    <input type="file" name="image" id="image" required accept="image/*" onchange="loadFile(event)">
                    <div class="preview-img">
                        <img id="output"/>
                    </div>
                    <script>
                        var loadFile = function(event) {
                        var reader = new FileReader();
                        reader.onload = function(){
                            var output = document.getElementById('output');
                            output.src = reader.result;
                        };
                        reader.readAsDataURL(event.target.files[0]);
                        };
                    </script>

                    <label for="phone">Phone:</label> <br>
                    <input type="text" name="phone" id="phone" placeholder="Enter your username..." maxlength="10" required>

                    <label for="">Address:</label> <br>
                    <textarea name="address" id="address" cols="30" rows="3" placeholder="Enter your address..."></textarea>

                    <label for="password">Password:</label> <br>
                    <input type="password" name="password" id="password" placeholder="Enter your username..." minlength="6" title="Password must be between 6-16 characters" maxlength="16" required>

                    <label for="re-password">Re-password:</label> <br>
                    <input type="password" name="re-password" id="re-password" placeholder="Enter your username..." minlength="6" maxlength="16" required oninput="checkPass()">
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
                            <button type="submit" id="btnregister">Register</button>
                        </div>
                        <div class="register-right">
                            <a href="/login"><u>Already have an account!</u></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection