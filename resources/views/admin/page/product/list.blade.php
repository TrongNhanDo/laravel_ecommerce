@extends('admin.layout.master')
@section('admintitle','List Product')
@section('admincontainer')
  <div class="contai">
    <h1>LIST PRODUCT <button class="btn btn-primary show_add" style="margin-left: 50px;" type='button' data-toggle='modal' data-target='#add_product'>Add new product</button></h1>
    <!-- list product -->
    <table>
      <thead>
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
      </thead>
      <tbody></tbody>
    </table>
  </div>
  <!-- Modal detail-->
<div class="modal fade" id="detail_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Product</h5>
        <button type="button" class="close" data-dismiss="modal" id="close_product_detail" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label  for="pro_id">Product ID:</label>
        <input class="form form-control" type="text" name="pro_id" id="pro_id" placeholder="Product name..." required readonly>
        <label for="pro_name">Product Name:</label>
        <input class="form form-control" type="text" name="pro_name" id="pro_name" placeholder="Product name..." required>
        <label for="pro_cate">Category:</label>
        <select class="form form-control" name="pro_cate" id="pro_cate">
          @foreach($cate as $ca)
          <option value="{{$ca->id}}">{{$ca->cate_name}}</option>
          @endforeach
        </select>
        <label for="pro_image">Image:</label> <br>
        <input type="file" name="pro_image" id="pro_image" required accept="image/*" onchange="loadFile(event)">
        <div class="preview-img" style="margin: 10px;">
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
        <label for="pro_des">Description:</label>
        <textarea class="form form-control" name="pro_des" id="pro_des" cols="30" rows="5" placeholder="Description...">Tất cả dòng điện thoại</textarea>
        <label for="pro_price">Price:</label>
        <input class="form form-control" type="text" name="pro_price" id="pro_price" placeholder="Price..." required>
        <label for="pro_amount">Amount:</label>
        <input class="form form-control" type="number" name="pro_amount" id="pro_amount" value="1" min="1" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save">Save changes</button>
      </div>
    </div>
  </div>
</div>


  <!-- Modal add -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" id="close_product_add" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label for="name">Product Name:</label>
            <input class="form form-control" type="text" name="name" id="name" placeholder="Product name..." required>
            <label for="cate">Category:</label>
            <select class="form form-control" name="cate" id="cate">
              @foreach($cate as $ca)
              <option value="{{$ca->id}}">{{$ca->cate_name}}</option>
              @endforeach
            </select>
            <label for="image">Image:</label> <br>
            <input type="file" name="image" id="image" required accept="image/*" onchange="loadFile2(event)">
            <div class="preview-img" style="margin: 10px;">
              <img id="output2"/>
            </div>
            <script>
              var loadFile2 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('output2');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
              };
            </script>
            <label for="des">Description:</label>
            <textarea class="form form-control" name="des" id="des" cols="30" rows="5" placeholder="Description...">Tất cả dòng điện thoại</textarea>
            <label for="price">Price:</label>
            <input class="form form-control" type="text" name="price" id="price" placeholder="Price..." required>
            <label for="amount">Amount:</label>
            <input class="form form-control" type="number" name="amount" id="amount" value="1" min="1" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <script>
    const _token = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      load_product();
      // load product 
      function load_product(){
        $.ajax({
          type: 'get',
          url: '/admin/product/listproduct',
          dataType: 'json',
          data: {_token:_token},
          success: function(data){
            $("tbody").html('');
            $("tbody").append(data);
          }
        });
      }
      
      // detail
      $(document).on('click','.detail',function(e){
        e.preventDefault();
        $.ajax({
          type: 'get',
          url: '/admin/product/detail/'+ $(this).val(),
          dataType: 'json',
          data: {},
          success: function(data){
            if(data){
              $("#pro_id").val(data['id']);
              $('#pro_name').val(data['product_name']);
              $('#output').attr('src','http://127.0.0.1:8000/image_upload/'+data['image']);
              $("#pro_cate").val(data['id_cate']).change();
              $('#pro_des').val(data['description']);
              $('#pro_price').val(data['price']);
              $('#pro_amount').val(data['amount']);
            }
          }
        });
      });

      //update
      $(document).on('click','.save',function(e){
        e.preventDefault();
        let files  = $("#pro_image")[0].files;
        let pro_img = new FormData();
        pro_img.append('file',files[0]);
        pro_img.append('_token',_token);
        let pro_name = $('#pro_name').val();
        let value_img = $('#pro_image').val();
        let pro_cate= $("#pro_cate").val();
        let pro_des= $('#pro_des').val();
        let pro_price= $('#pro_price').val();
        let pro_amount= $('#pro_amount').val();
        if(pro_name==''|| pro_des ==''|| pro_price==''||pro_price < 1000){
          alert('Please fill out fields and check data!');
        }else{
          $.ajax({
            type: 'put',
            url: '/admin/product/'+$("#pro_id").val(),
            dataType: 'json',
            data: {
              pro_name : pro_name,
              pro_cate: pro_cate,
              pro_des: pro_des,
              pro_price: pro_price,
              pro_amount: pro_amount,
              pro_img: pro_img,
              _token: _token
            },
            success: function(data){
              if(data==1){
                alert('Update product success');
              }else{
                alert("update product fail");
              } 
            }
          });
        }
      });

      //delete
      $(document).on('click','.button-delete',function(e){
        e.preventDefault();
        if(confirm('Are you sure to want to delete this product?')){
          $.ajax({
            type: 'delete',
            url: '/admin/product/'+$(this).val(),
            dataType: 'json',
            data: {},
            success: function(data){
              if(data==1){
                alert('Delete this product success');
                load_product();
              }else{
                alert('Delete this product fail!');
              }
            }
          });
        }
      });

      //add

    });
  </script>
@endsection