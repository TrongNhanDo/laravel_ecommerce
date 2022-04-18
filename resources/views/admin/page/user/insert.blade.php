@extends('admin.layout.master')
@section('admintitle','Insert User')
@section('admincontainer')
  <div class="contai">
    <div class="head-add">
      <div class="heading-add"><h2>ADD NEW USER</h2></div>
      <div class="noti-add"><h2>@php if(isset($msg)) echo $msg; @endphp</h2></div>
    </div>
    <div class="addprod row">
	<form action="" method="post">
      <div class="row-item">
        <div class="lbl">
          <label for="">Name:</label>
        </div>
        <div class="inp">
          <input type="text" name="" id="" placeholder="Your name..." required>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="">Email:</label>
        </div>
        <div class="inp">
          <input type="email" name="" id="" placeholder="abc@gmail.com..." required>
        </div>
      </div>
	  <div class="row-item">
        <div class="lbl">
          <label for="">Password:</label>
        </div>
        <div class="inp">
          <input type="password" name="" id="" placeholder="Password..." required>
        </div>
      </div>
	  <div class="row-item">
        <div class="lbl">
          <label for="">Re-password:</label>
        </div>
        <div class="inp">
          <input type="email" name="" id="" placeholder="Re-password..." required>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="">Image:</label>
        </div>
        <div class="inp">
          <input type="file" name="" id="" required accept="image/*" onchange="loadFile(event)">
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
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="">Address:</label>
        </div>
        <div class="inp">
          <textarea name="" id="" cols="30" rows="3" placeholder="Your Address..." required></textarea>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="">Phone:</label>
        </div>
        <div class="inp">
          <input type="text" name="" id="" placeholder="Your phone..." maxlength="10" required>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="">Role:</label>
        </div>
        <div class="inp">
          <select name="" id="" required>
			  <option value="0">User</option>
			  <option value="1">Admin</option>
			  <option value="2">Manager</option>
		  </select>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="">Action:</label>
        </div>
        <div class="inp">
          <button type="submit" name="btn-add">SAVE</button>
        </div>
      </div>
	</form>
    </div>
  </div>
@endsection