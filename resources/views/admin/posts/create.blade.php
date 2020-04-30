@extends('template_admin/main')
@section('title_post', 'Create Post')
@section('sub1', 'Posts')
@section('sub2', 'Create Post')

@section('content')

<div class="card">                 
    <div class="card-body">
      @include('admin.include.error')
      <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-9">
              @csrf
                    <div class="form-group">
                      <label class="col-form-label text-md-left col-12 col-md-12 col-lg-3">Title</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                       
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-form-label text-md-left col-12 col-md-12 col-lg-3">Permalink <i class="fas fa-link"></i></label>
                      <div class="col-sm-12 col-md-12">
                        <input type="text" class="form-control form-control" name="slug" id="slug" value="{{ old('slug') }}" readonly="">
                       
                      </div>
                    </div>

      
                    <div class="form-group">
                      <label class="col-form-label text-md-left col-12 col-md-12 col-lg-3">Content</label>
                      <div class="col-sm-12">
                        <textarea name="content">{{ old('content') }}</textarea>
                       
                      </div>
                    </div>
  
              </div>
              <div class="col-sm-3">

                    <div class="form-group">
                      <label class="col-sm-6">Thumbnail</label>
                      <small class="col-sm-6">*Thumbnail max 2MB</small>
                      <div class="col-sm-12">                                                             
                            <div class="custom-file">
                            <br>
                            <input name="picture" type="file" class="custom-file-input" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"><label class="custom-file-label">Choose File</label>
                            </div>          
                      </div>
                      <div class="col-sm-12"><img id="output" src="" class="img-fluid"></div>
                      
                    </div>



                    <div class="form-group">
                      <label class="col-sm-12">Category</label>
                      <div class="col-sm-12">
                        <select class="form-control selectric" name="id_category">
                          <option value="" class="holder">Select Category</option>
                          @foreach ($category as $result)
                          <option value="{{ $result->id }}"
                            {{ (collect(old('id_category'))->contains($result->id)) ? 'selected':'' }}  
                    
                            >{{ $result->name_category }}</option>
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
                            {{ (collect(old('tag'))->contains($result->id)) ? 'selected':'' }}  
                            >{{ $result->tag }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="section-title col-sm-12">Status Post</div>
                        <div class="custom-control custom-radio">
                          <div class="col-sm-12">
                          <input type="radio" id="customRadio1" name="status" class="custom-control-input" checked value="1">
                          <label class="custom-control-label" for="customRadio1">Publish</label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio">
                        <div class="col-sm-12">
                          <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="0">
                          <label class="custom-control-label" for="customRadio2">Unpublish</label>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">       
                      <div class="col-sm-12">
                        <button class="btn btn-primary btn-block" type="submit">Save Post</button>
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

  <!-- CKEditor init -->

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