<div class="card-header">
                    <h4>General Settings</h4>
                    </div>
                    <div class="card-body">
                      <p class="text-muted">General settings such as site title, site logo etc.</p>
                      <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site Name</label>
                        <div class="col-sm-6 col-md-9">
                          <input type="text" name="site_name" class="form-control" id="site-title" value="{{ $setting->site_name }}">
                        </div>
                      </div>

                     <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">Logo</label>
                        <div class="col-sm-6 col-md-9">
                          @if( $setting->logo )
                           <img src="{{ asset($setting->logo) }}" class="img-fluid" width="100px"/>
                          @endif
                        </div>
                    </div>                  

                      <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right"></label>
                        <div class="col-sm-6 col-md-9">
                          <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input" id="site-logo">
                            
                            <label class="custom-file-label">Choose File</label>
                          </div>
                          <div class="form-text text-muted">Max 1 MB / Size 278 x 70 / Leave if there are no changes</div>
                        </div>
                      </div>

                    <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                        <div class="col-sm-6 col-md-9">
                          @if( $setting->nav_logo )
                           <img src="{{ asset($setting->nav_logo) }}" class="img-fluid" width="100px" />
                          @endif
                        </div>
                    </div>  

                      <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right"></label>
                        <div class="col-sm-6 col-md-9">
                          <div class="custom-file">
                            <input type="file" name="nav_logo" class="custom-file-input" id="site-favicon">
                            <label class="custom-file-label">Choose File</label>
                          </div>
                          <div class="form-text text-muted">Max 1 MB / Leave if there are no changes</div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="form-control-label col-sm-3 mt-3 text-md-right">Google Analytics Code</label>
                        <div class="col-sm-6 col-md-9">
                          <textarea class="form-control codeeditor" name="google_analystic" >{{ $setting->google_analystic }}</textarea>
                          <div class="form-text text-danger">Be sure to copy everything including the script tag<a target="_blank" href="https://support.google.com/analytics/answer/1008080?hl=en"> Reference</a></div>
                        </div>
                      </div>

                      <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Disqus (Comment Plugin)</label>
                        <div class="col-sm-6 col-md-9">
                          <input type="text" name="disqus" class="form-control" id="site-title" placeholder="just provide your .js disqus link" value="{{ $setting->disqus }}">
                          <small class="form-text text-danger">https://cms-ta2n2pfsfc.disqus.com/embed.js (IMPORTANT: Only copy the url .js, not all)<a href="https://disqus.com/admin/universalcode/" target="_blank">  Reference </a></small>
                        </div>
                      </div>
                    </div>