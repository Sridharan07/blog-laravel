@extends('template_admin/main')
@section('title_post', 'Edit Category')
@section('sub1', 'Posts')
@section('sub2', 'Edit Category')

@section('content')

      <div class="row">
              <div class="col-12">
                <div class="card">                 
                  <div class="card-body">

                                     
                    
                    @include('admin.include.error')
                    
                    <form action="{{ route('category.update', ['id' => $category->id] )}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="category" value="{{ $category->name_category }}">
                       
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary btn-block" type="submit">Update Category</button>
                      </div>
                    </div>
                    </form>


                  </div>
                </div>
              </div>
            </div>


@endsection