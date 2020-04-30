@extends('template_admin/main')
@section('title_post', 'Site Settings')
@section('sub1', 'Site Setting')
@section('sub2', 'Site Settings')

@section('content')

			<div class="section-body">
            

            <div id="output-status"></div>
            <div class="row">
              <div class="col-md-4">

                <div class="card">
                  <div class="card-header">
                    <h4>Site Settings</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">General Setting</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Social Media</a>
                          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Contact Us</a>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">About Us</a>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-meta" role="tab" aria-controls="v-pills-settings" aria-selected="false">Meta</a>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
                 @include('admin.include.error')
              </div>

              <div class="col-md-8">
                <form id="setting-form" action="{{ route('setting.update', ['id' => $setting->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card tab-content" id="settings-card">
                    
                     <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            @include('admin.setting.general')
                          </div>
                          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            @include('admin.setting.social')
                          </div>
                          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            @include('admin.setting.contact')
                          </div>
                          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            @include('admin.setting.about')
                          </div>
                          <div class="tab-pane fade" id="v-pills-meta" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            @include('admin.setting.meta')
                          </div>
                        </div>



                    <div class="card-footer bg-whitesmoke text-md-right">
                      <button class="btn btn-primary " id="save-btn">Save Settings</button>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>



@endsection