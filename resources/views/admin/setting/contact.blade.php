<div class="card-header">
                      <h4>Contact Us Settings</h4>
                    </div>
                    <div class="card-body">

                      <p class="text-muted">Data settings are displayed on the contact us menu</p>

                      <div class="form-group row align-items-center">
                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Email</label>
                        <div class="col-sm-6 col-md-9">
                          <input type="email" name="contact_email" class="form-control" id="site-title" value="{{ $setting->contact_email }}">
                        </div>
                      </div>

                      <div class="form-group row align-items-center">
                      <label for="site-title" class="form-control-label col-sm-3 text-md-right">Cellphone / Telephone number</label>
                        <div class="col-sm-6 col-md-9">
                          <input type="text" name="contact_number" class="form-control" id="site-title" value="{{ $setting->contact_number }}">
                        </div>
                      </div>

                      <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Address</label>
                        <div class="col-sm-6 col-md-9">
                          <input type="text" name=" address" class="form-control" id="site-title" value="{{ $setting->address }}">
                        </div>
                      </div>
                      
                    
                      <div class="form-group row">
                        <label class="form-control-label col-sm-3 mt-3 text-md-right">Google Maps</label>
                        <div class="col-sm-6 col-md-9">
                          <textarea class="form-control" name="gmaps">{{ $setting->gmaps }}</textarea>
                          <small class="form-text text-danger">Paste the Google Map script (embed the data from Google Maps)</small>
                        </div>
                      </div>

                    </div>
