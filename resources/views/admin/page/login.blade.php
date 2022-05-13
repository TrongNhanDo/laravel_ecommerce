<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="{{asset('adminlte/dist/css/login.css')}}">
	<link rel="icon" href="{{asset('temp/images/logo.png')}}" type="image/gif" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<style>
		button{
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="border: 1px solid grey;margin-top: 30px;">
			<div class="imgcontainer">
				<img src="{{asset('image_upload/download.jpg')}}" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label for="username"><b>Username:</b></label>
				<input class="form form-control" type="text" placeholder="Enter Username" name="username" id="username" required>

				<label for="password"><b>Password:</b></label>
				<input class="form form-control" type="password" placeholder="Enter Password" name="password" id="password" required>
					
				<button class="form form-control btn btn-primary login" type="submit">Login</button>
				<label>
			</div>
			<script>
				const _token = $('meta[name="csrf-token"]').attr('content');
				$(document).ready(function(){
					$(document).on('click','.login',function(e){
						e.preventDefault();
						let username = $("#username").val();
						let password = $("#password").val();
						if(username==""){
							alert("Please enter username");
							$("#username").focus();
						}else if(password==""){
							alert("Please enter password");
							$("#password").focus();
						}else{
							$.ajax({
								type:'post',
								url: '/admin/login',
								dataType: 'json',
								data: {
									username:username,
									password:password,
									_token:_token
								},
								success: function(data){
									if(data==1){
										alert("Login success");
										location.href = './admin';
									}else{
										alert("Login fail. Please check username or password again.");
									}
								}
							});
						}
					});
				});
			</script>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>