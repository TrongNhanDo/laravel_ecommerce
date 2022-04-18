@extends('admin.layout.master')
@section('admintitle','List Contact')
@section('admincontainer')
  <div class="contai">
    <h1>LIST CONTACT</h1>
    <table>
      <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
		<th>Reply mail</th>
        <th>Phone</th>
		<th>Call</th>
        <th>Message</th>
		<th>Create_At</th>
      </tr>
      @php $i = 0; @endphp
      @forelse($contact as $con)
      @php $i++; @endphp
      <tr>
        <td>{{$i}}</td>
        <td>{{$con->name}}</td>
        <td>{{$con->email}}</td>
		<td><a href="mailto:{{$con->email}}">Reply</a></td>
        <td>{{$con->phone}}</td>
		<td><a href="callto:{{$con->phone}}">Call</a></td>
        <td>{{$con->message}}</td>
        <td>{{$con->created_at}}</td>
      </tr>
      @empty
	  <tr>
		  <td colspan="8" class="empt">No contact yet!</td>
	  </tr>
      @endforelse
    </table>
  </div>
@endsection