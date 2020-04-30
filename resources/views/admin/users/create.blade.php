@extends('template_admin/main')
@section('title_post', 'Create User')
@section('sub1', 'User')
@section('sub2', 'Create User')

@section('content')

			<div class="row">
              <div class="col-12">
                <div class="card">                 
                  <div class="card-body">
                                     
                    
                    @include('admin.include.error')
                    
                    <form action="{{ route('user.store')}}" method="POST" >
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name">
                       
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="email" class="form-control" name="email">
                       
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary btn-block" type="submit">Create User</button>
                      </div>
                    </div>
                    </form>


                  </div>
                </div>
              </div>
            </div>


@endsection