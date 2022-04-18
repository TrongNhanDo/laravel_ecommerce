@extends('admin.layout.master')
@section('admintitle','List User') 
@section('admincontainer')
  <div class="contai">
    <table>
      <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Role</th>
		    <th>Created_At</th>
        <th>Updated_At</th>
        <th colspan="2">Action</th>
      </tr>
      @php $i = 0; @endphp
      @forelse($user as $us)
      @php $i++; @endphp
      <tr>
        <td>{{$i}}</td>
        <td>{{$us->name}}</td>
        <td>{{$us->email}}</td>
        <td>{{$us->password}}</td>
        <td>
        <img src="{{asset('image_upload')}}/{{$us->image}}" alt="">
        </td>
            <td>{{$us->address}}</td>
            <td>{{$us->phone}}</td>
            <td>
          @php 
            $quyen = $us->role;
            if($quyen==0) echo 'User';
            elseif($quyen==1) echo 'Admin';
            else echo 'Manager';
          @endphp
        </td>
        <td>{{$us->updated_at}}</td>
        <td>{{$us->updated_at}}</td>
        <td>
          <a href="{{route('admin.user_edit',$us->id)}}">Detail</a>
        </td>
        <td>
            <form action="" method="post">
              @csrf
              @method('DELETE')
              <button class="button-delete" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="10" class="empt">No account yet!</td>
      </tr>
      @endforelse
    </table>
  </div>
@endsection