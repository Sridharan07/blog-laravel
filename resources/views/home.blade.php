@extends('template_admin/main')
@section('title_post', 'Dashboard')
@section('sub1', 'Dashboard')
@section('sub2', 'Details')

@section('content')
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    {{ $user_count }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Post</h4>
                  </div>
                  <div class="card-body">
                    {{ $post_count }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tags</h4>
                  </div>
                  <div class="card-body">
                    {{ $tag_count }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Category</h4>
                  </div>
                  <div class="card-body">
                    {{ $category_count }}
                  </div>
                </div>
              </div>
            </div>                  
          </div>
        
          <div class="row">
              <div class="col-lg-7 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Latest Post</h4>
                  <div class="card-header-action">
                    <a href="{{ route('post.index') }}" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Author</th>
           
                        </tr>
                      </thead>
                      <tbody> 
                        @foreach($post as $result)                        
                        <tr>
                          <td>
                            {{ $result->title }}
                            <div class="table-links">
                              in <a href="#">{{ $result->category->name_category }}</a>
                              <div class="bullet"></div>
                              <a href="#">{{ $result->view }} View</a>
                            </div>
                          </td>
                          <td>
                            <a href="{{ route('user.index') }}" class="font-weight-600"> {{ $result->user->name }}</a>
                          </td>
                        
                        </tr>
                        @endforeach
              
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Authors</h4>
                </div>
                <div class="card-body">
                  <div class="row pb-2">

                    @foreach($user as $Results)
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div class="avatar-item mb-0">
                        <img alt="image" src="{{ asset($Results->profile->avatar )}}" class="img-fluid" data-toggle="tooltip" title="{{ $Results->name }}">
                        <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                      </div>
                    </div>
                    @endforeach

             
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection






