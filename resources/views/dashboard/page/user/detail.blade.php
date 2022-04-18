@extends('dashboard.layout.master')

@section('title','Information User')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="info_user">
                    <h1>INFORMATION USER</h1>
                    <span>@if(isset($msg)) echo $msg; @endif</span>
                    <hr>
                </div>
                <div class="hang">
                    <div class="cot1">
                        <form action="" method="post" class="fm_register">
                            @csrf
                            <label for="fullname">Fullname:</label> <br>
                            <input type="text" name="fullname" id="fullname" value="{{$user->name}}" placeholder="Enter your name..." required>

                            <label for="email">Email:</label> <br>
                            <input type="mail" name="email" id="email" value="{{$user->email}}" placeholder="Enter your username..." required readonly>

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
                            <input type="text" name="phone" id="phone" placeholder="Enter your username..." maxlength="10" required value="{{$user->phone}}" />

                            <label for="">Address:</label> <br>
                            <textarea name="address" id="address" cols="30" rows="3" placeholder="Enter your address...">{{$user->address}}</textarea>

                            <button type="submit">SAVE</button>
                        </form>
                    </div>
                    <div class="cot2">
                        <form action="" method="post" class="fm_register">
                            @csrf
                            <label for="">Old password:</label> <br>
                            <input type="password" name="oldpassword" id="oldpassword" placeholder="Enter old password...">

                            <label for="password">New password:</label> <br>
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

                            <button type="submit" id="btnregister">CHANGE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection