@extends('admin.layout.master')
@section('admintitle','List Order')
@section('admincontainer')
  <div class="contai">
    <h1>LIST ORDER</h1>
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
	  <tr>
		  <td colspan="8" class="empt">No contact yet!</td>
	  </tr>
    </table>
  </div>	
@endsection