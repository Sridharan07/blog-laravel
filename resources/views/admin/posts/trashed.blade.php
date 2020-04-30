@extends('template_admin/main')
@section('title_post', 'Trashed Posts')
@section('sub1', 'Posts')
@section('sub2', 'List Trashed Posts')
@stack('script')
@section('content')
<a href="{{ route('post.index') }}" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
<br><br>

<div class="table-responsive">
<table class="table table-hover table-bordered" id="user_table">
           <thead class="bg-white">
            <tr>
            	<th width="1%">No</th>
                <th width="30%">Title</th>
                <th width="10%">Author</th>
                <th width="10%">Category</th>
                <th width="10%">Status</th>
                <th width="10%">Date</th>
                <th width="10%">Picture</th>
                <th width="20%">Action</th>
            </tr>
           </thead>
           <tbody>
           	
           </tbody>
       </table>
	
</table>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="confirmModal" data-backdrop="false">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger">ATTENTION!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
            
                  <p><b>Post deleted on this form can no longer be returned</b></p> 
                   <p>*Do you agree to delete it permanently?</p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete Permanently</button>
              </div>
            </div>
          </div>
        </div>


@endsection

@push('scripts')
<script>
$(document).ready(function(){

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('post.trashed') }}",
  },
  columns:[
   {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},

   {data: 'title',name: 'title'},
   {data: 'user',name: 'user' },
   {data: 'category',name: 'category' },
   {data: 'status',name: 'status' },
   {data: 'created_at',name: 'created_at' },

   {data: 'picture', name: 'picture',orderable: false},
   {data: 'action',name: 'action',orderable: false}
  ]
 });

  var id;

 $(document).on('click', '.delete', function(){
  id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"kill/"+id,
   beforeSend:function(){
    $('#ok_button').text('Erase Data Permanently');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    });
    
    
       iziToast.warning({
        title: 'Post Successfully Deleted (Permanent)',
        message: '{{ Session('delete')}}',
        position: 'bottomRight'
        });

   }
  })
 });

});
</script>
@endpush






