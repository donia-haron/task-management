@extends('master.app')
@section('title','Create New Company')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header d-flex justify-content-center">
                <h1 class="page-title">Create New Company</h1> 
              </div>
              <div class="row row-cards row-deck d-flex justify-content-center">
                <div class="col-12">
          
                  <div class="card p-4">
                      <div class="card-body">
                            <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control {{($errors->has('name'))?'is-invalid':''}}" value="{{old('name')}}" name="name" placeholder="Enter company name...">
                                    @if($errors->has('name'))
                                       <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control {{($errors->has('email'))?'is-invalid':''}}" value="{{old('email')}}" name="email" placeholder="Enter company email...">
                                    @if($errors->has('email'))
                                       <p class="text-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control {{($errors->has('website'))?'is-invalid':''}}" value="{{old('website')}}" name="website" placeholder="Enter company website...">
                                    @if($errors->has('website'))
                                       <p class="text-danger">{{$errors->first('website')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                <input type="file" name="logo" placeholder="Choose logo" value="{{old('logo')}}" id="logo">
                @error('logo')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
                                <div class="card-footer float-right">
                                    <a href="{{route('company.index')}}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                      </div>
              
                  </div>
                </div>
              </div>              
            </div>            
          </div>
      </div>
    @endsection