@extends('admin.layout.master')
@section('admintitle','Insert Category')
@section('admincontainer')
  <div class="contai">
    <div class="head-add">
      <div class="heading-add"><h2>ADD NEW CATEGORY</h2></div>
      <div class="noti-add"><h2>@php if(isset($kq)) echo $kq; @endphp</h2></div>
    </div>
    <div class="addprod row">
	<form action="{{route('admin.category_store')}}" method="post">
    @csrf
      <div class="row-item">
        <div class="lbl">
          <label for="">Name:</label>
        </div>
        <div class="inp">
          <input type="text" name="cate_name" id="cate_name" placeholder="Your name..." required>
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