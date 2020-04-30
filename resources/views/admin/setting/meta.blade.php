<div class="card-header">
                      <h4>Meta Settings</h4>
                    </div>
                    <div class="card-body">
                      <p class="text-muted">Meta settings for indexing on Google etc.</p>
                      <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Meta Description</label>
                        <div class="col-sm-6 col-md-9">
                          <textarea class="form-control codeeditor" name="meta_description" >{{ $setting->meta_description }}</textarea>
                          <small class="form-text text-muted">Meta Descriptions max 150 words</small>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Meta Keywords</label>
                        <div class="col-sm-6 col-md-9">
                          <input type="text" name="meta_keywords" class="form-control" id="site-title" value="{{ $setting->meta_keywords }}">
                          <small class="form-text text-muted">Meta Keywords (Separate keywords with commas)</small>
                        </div>
                      </div>
                  
                    </div>