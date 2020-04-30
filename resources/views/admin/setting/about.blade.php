<div class="card-header">
                      <h4>About Us Settings</h4>
                    </div>
                    <div class="card-body">
                      <p class="text-muted">Data settings are displayed on the about us menu</p>
             
                      <div class="form-group row">
                        <label class="form-control-label col-sm-3 mt-3 text-md-right">About Us</label>
                        <div class="col-sm-6 col-md-9">
                          <textarea class="form-control codeeditor" name="about_us" >{{ $setting->about_us }}</textarea>
                        </div>
                      </div>

                    </div>

@push('scripts')
  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>


  <script>
    $('textarea[name=about_us]').ckeditor({
      height: 500,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  </script>



@endpush