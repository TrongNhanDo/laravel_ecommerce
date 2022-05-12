@extends('admin.layout.master')
@section('admintitle','List Category')
@section('admincontainer')
  <div class="contai">
    <h1>
      LIST CATEGORY 
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_cate" style="margin-left: 30px">
        Add new category
      </button>
    </h1>
    <table>
      <thead>
        <th>STT</th>
        <th>Category</th>
        <th>Create_At</th>
        <th>Update_At</th>
        <th>Action</th>
      </thead>
      <tbody></tbody>
    </table>
  </div>
  <!-- Modal add -->
<div class="modal fade" id="add_cate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
        <button id="close_add_cate" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="cate_name">Catetory Name:</label>
        <input type="text" name="cate_name" id="cate_name" class="form form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!-- Modal edit -->
<div class="modal fade" id="edit_cate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail category</h5>
        <button id="close_edit_cate" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="ed_cate_id">Catetory Id:</label>
        <input type="text" name="ed_cate_id" id="ed_cate_id" class="form form-control" readonly>
        <label for="ed_cate_name">Catetory Name:</label>
        <input type="text" name="ed_cate_name" id="ed_cate_name" class="form form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <script>
    const _token = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      load_cate();
      //load category
      function load_cate(){
        $.ajax({
          type: 'get',
          url: '/admin/category/listcategory',
          dataType: 'json',
          data: {},
          success: function(data){
            $("tbody").html("");
            $("tbody").append(data);
          }
        });
      }

      //add category 
      $(document).on('click','.add', function(e){
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: '/admin/category',
          dataType: 'json',
          data: {
            cate_name : $("#cate_name").val(),
            _token:_token
          },
          success: function(data){
            if(data==1){
              alert("add new category success");
              $('#add_cate').modal('hide');
              load_cate();
            }else if(data==2){
              alert("category name has already exist");
            }else{
              alert("add new category fail");
            }
          }
        })
      });

      //delete 
      $(document).on('click','.button-delete',function(e){
        e.preventDefault();
        if(confirm('Are you sure want to delete this category?')){
          $.ajax({
            type: 'delete',
            url: '/admin/category/'+$(this).val(),
            dataType: 'json',
            data: {_token:_token},
            success: function(data){
              if(data==1){
                load_cate();
                alert("Delete this category success");
              }else{
                alert('Delete this category fail');
              }
            }
          });
        }
      });

      //detail 
      $(document).on('click','.detail',function(e){
        e.preventDefault();
        $.ajax({
          type: 'get',
          url : '/admin/category/detail/'+$(this).val(),
          dataType: 'json',
          data: {_token:_token},
          success: function(data){
            $("#ed_cate_name").val(data['cate_name']);
            $("#ed_cate_id").val(data['id']);
          }
        })
      });

      //update 
      $(document).on('click','.save',function(e){
        $.ajax({
          type: 'put',
          url: '/admin/category/'+$("#ed_cate_id").val(),
          dataType: 'json',
          data: {
            cate_name: $("#ed_cate_name").val(),
            _token:_token
          },
          success: function(data){
            if(data==1){
              alert("Update success");
              $("#edit_cate").modal('hide');
              load_cate();
            }else if(data==2){
              alert("New category name must be different old name");
              $("#ed_cate_name").focus();
            }else{
              alert("Update fail");
            }
          }
        });
      });
    });
  </script>
@endsection