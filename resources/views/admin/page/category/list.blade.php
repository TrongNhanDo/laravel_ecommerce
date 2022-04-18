@extends('admin.layout.master')
@section('admintitle','List Category')
@section('admincontainer')
  <div class="contai">
    <h1>LIST CATEGORY</h1>
    <table>
      <tr>
        <th>STT</th>
        <th>Category</th>
        <th>Create_At</th>
        <th>Update_At</th>
        <th>Action</th>
      </tr>
      @php $i = 0; @endphp
      @forelse($cate as $cat)
      @php $i++; @endphp
      <tr>
        <td>{{$i}}</td>
        <td>{{$cat->cate_name}}</td>
        <td>{{$cat->created_at}}</td>
        <td>{{$cat->updated_at}}</td>
        <td>
          <div class="action">
            <a href="{{route('admin.category_edit',$cat->id)}}">Edit</a>

            <form action="{{route('admin.category_delete',$cat->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="button-delete" type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="empt">No category yet!</td>
      </tr>
      @endforelse
    </table>
  </div>
@endsection