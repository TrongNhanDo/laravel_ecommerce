<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('adminlte/dist/css/login.css')}}">
</head>
<body>
	<form action="{{route('admin.login')}}" method="post">
		@csrf
		<div class="imgcontainer">
			<img src="{{asset('image_upload/download.jpg')}}" alt="Avatar" class="avatar">
			<h3>@if(isset($msg)) {{$msg}} @endif</h3>
		</div>

		<div class="container">
			<label for="username"><b>Username:</b></label>
			<input type="text" placeholder="Enter Username" name="username" id="username" required>

			<label for="password"><b>Password:</b></label>
			<input type="password" placeholder="Enter Password" name="password" id="password" required>
				
			<button type="submit">Login</button>
			<label>
		</div>
	</form>
</body>
</html>