@extends('admin.layout.master')
@section('admintitle','Edit User') 
@section('admincontainer')
  <div class="contai">
    <h1>{{$user->name}}</h1>
    <h1>{{$user->email}}</h1>
  </div>
@endsection