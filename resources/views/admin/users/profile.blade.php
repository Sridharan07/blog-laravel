@extends('template_admin/main')
@section('title_post', 'Edit Your Profile')
@section('sub1', 'Profile')
@section('sub2', 'Create Profile')

@section('content')

			<div class="row">
              <div class="col-12">
                <div class="card">                 
                  <div class="card-body">
                                     
                    
                    @include('admin.include.error')
                    
                    <form action="{{ route('profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                       
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="about" >{{ $user->profile->about }}</textarea>
                       
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                       
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="facebook" value="{{ $user->profile->facebook }}">
                       
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="youtube" value="{{ $user->profile->youtube }}">
                       
                      </div>
                    </div>
                    @if($user->profile->avatar)                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Avatar</label>
                      <div class="col-sm-12 col-md-7">
                        <img src="{{ asset($user->profile->avatar) }}" class="img-fluid" width="150px">
                       
                      </div>
                    </div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select If you want to change your avatar</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" name="avatar" class="form-control" />
                       
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" name="password">
                       
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary btn-block" type="submit">Save Profile</button>
                      </div>
                    </div>
                    </form>


                  </div>
                </div>
              </div>
            </div>


@endsection