@extends('admin.layout.master')
@section('admintitle','List Product')
@section('admincontainer')
  <div class="contai">
    <h1>LIST PRODUCT</h1>
    <table>
      <tr>
        <th>STT</th>
        <th>Category</th>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
        <th>Amount</th>
        <th>View</th>
        <th>Status</th>
        <th>Create_At</th>
        <th>Update_At</th>
        <th>Action</th>
      </tr>
      @php $i = 0; @endphp
      @forelse($product as $pro)
      @php $i++; @endphp
      <tr>
        <td>{{$i}}</td>
        <td>{{$pro->cate_name}}</td>
        <td>{{$pro->product_name}}</td>
        <td style="width: 15%">
          <img src="{{asset('image_upload')}}/{{$pro->image}}" alt="">
        </td>
        <td>{{$pro->description}}</td>
        <td>{{number_format($pro->price)}}đ</td>
        <td>{{$pro->amount}}</td>
        <td>{{$pro->view}}</td>
        <td>{{$pro->status}}</td>
        <td>{{$pro->created_at}}</td>
        <td>{{$pro->updated_at}}</td>
        <td>
          <div  class="action">
            <a href="{{route('admin.product_edit',$pro->id)}}">Edit</a>

            <form action="{{route('admin.product_delete',$pro->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="button-delete" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="12" class="empt">No product yet!</td>
      </tr>
      @endforelse
    </table>
  </div>
@endsection