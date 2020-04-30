@extends('template_admin/main')
@section('title_post', 'Edit Post')
@section('sub1', 'Posts')
@section('sub2', 'Edit Post')

@section('content')

<div class="card">                 
    <div class="card-body">
      @include('admin.include.error')
      <form action="{{ route('post.update', ['id' => $post->id ])}}" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-9">
              @csrf
                    <div class="form-group">
                      <label class="col-form-label text-md-left col-12 col-md-12 col-lg-3">Title</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                       
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-form-label text-md-left col-12 col-md-12 col-lg-3">Permalink <i class="fas fa-link"></i></label>
                      <div class="col-sm-12 col-md-12">
                        <input type="text" class="form-control form-control" name="slug" id="slug" value="{{ $post->slug }}" readonly="">
                       
                      </div>
                    </div>

      
                    <div class="form-group">
                      <label class="col-form-label text-md-left col-12 col-md-12 col-lg-3">Content</label>
                      <div class="col-sm-12">
                        <textarea name="content">{{ $post->content }}</textarea>
                       
                      </div>
                    </div>
  
                   </div>
                   <div class="col-sm-3">

                   <div class="form-group">
                      <label class="col-sm-12">Preview</label>
                        <div class="col-sm-12">
                          @if( $post->picture )
                           <img src="{{ asset($post->picture) }}" class="img-fluid" />
                          @endif
                        </div>
                    </div>

                

                    <div class="form-group">
                      <label class="col-sm-12">Thumbnail</label>
                      <div class="col-sm-12">
                        <div id="image-preview" >
                          <label for="image-upload" id="image-label" >Leave if you don't want changes</label>
                          <div class="custom-file">
                            <input type="file" name="picture" class="custom-file-input">
                            <label class="custom-file-label">Choose File</label>
                          </div>
                        </div>                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-12">Category</label>
                      <div class="col-sm-12">
                        <select class="form-control selectric" name="id_category">
                          <option value="" class="holder">Select Category</option>
                          @foreach ($category as $result)
                          <option value="{{ $result->id }}" {{ $post->category_id == $result->id ? 'selected' : '' }}>{{ $result->name_category }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-12">Tags</label>
                      <div class="col-sm-12">
                        <select class="form-control selectric" name="tag[]" multiple="">
               
                          @foreach ($tags as $result)
                            
                            <option value="{{ $result->id }}"
                            @foreach ($post->tags as $Results)
                              @if($result->id == $Results->id)
                              selected
                              @endif
                            @endforeach
                            >{{ $result->tag }}</option>
                            
                          
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="section-title col-sm-12">Status Post</div>
                        <div class="custom-control custom-radio">
                          <div class="col-sm-12">
                          <input  type="radio" id="customRadio1" name="status" class="custom-control-input" value="1" 
                          @if($post->status)
                          checked
                          @endif 
                          >
                          <label class="custom-control-label" for="customRadio1">Publish</label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio">
                        <div class="col-sm-12">
                          <input  type="radio" id="customRadio2" name="status" class="custom-control-input" value="0"
                          @if(!$post->status)
                          checked
                          @endif 
                          >
                          <label class="custom-control-label" for="customRadio2">Unpublish</label>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                     
                      <div class="col-sm-12">
                        <button class="btn btn-primary btn-block" type="submit">Update Post</button>
                      </div>
                    </div>
                       </div>  
          </div>  
         
        
      </form>
      </div>
    </div>


 

@endsection

@push('scripts')

  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>


  <script>
    $('textarea[name=content]').ckeditor({
      height: 500,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  </script>

   <script>
  $('#title').on('change', function(e) {
    $.get('{{ route('post.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>

@endpush