@extends('admin.layout.master')
@section('admintitle','Insert Product')
@section('admincontainer')
  <div class="contai">
    <div class="head-add">
      <div class="heading-add"><h2>ADD NEW PRODUCT</h2></div>
      <div class="noti-add"><h2>@php if(isset($kq)) echo $kq; @endphp</h2></div>
    </div>
    <div class="addprod row">
      <form action="{{route('admin.product_store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row-item">
        <div class="lbl">
          <label for="pro_name">Product Name:</label>
        </div>
        <div class="inp">
          <input type="text" name="pro_name" id="pro_name" placeholder="Product name..." required>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="pro_cate">Category:</label>
        </div>
        <div class="inp">
          <select name="pro_cate" id="pro_cate">
            @foreach($cate as $ca)
            <option value="{{$ca->id}}">{{$ca->cate_name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="pro_image">Image:</label>
        </div>
        <div class="inp">
          <input type="file" name="pro_image" id="pro_image" required accept="image/*" onchange="loadFile(event)">
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
          <label for="pro_des">Description:</label>
        </div>
        <div class="inp">
          <textarea name="pro_des" id="pro_des" cols="30" rows="5" placeholder="Description...">Tất cả dòng điện thoại</textarea>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="pro_price">Price:</label>
        </div>
        <div class="inp">
          <input type="text" name="pro_price" id="pro_price" placeholder="Price..." required>
        </div>
      </div>
      <div class="row-item">
        <div class="lbl">
          <label for="pro_amount">Amount:</label>
        </div>
        <div class="inp">
          <input type="number" name="pro_amount" id="pro_amount" value="1" min="1" required>
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