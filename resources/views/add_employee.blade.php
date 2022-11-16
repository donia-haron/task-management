@extends('master.app')
@section('title','Create New Employee')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header d-flex justify-content-center">
                <h1 class="page-title">Create New Employee</h1> 
              </div>
              <div class="row row-cards row-deck d-flex justify-content-center">
                <div class="col-12">
          
                  <div class="card p-4">
                      <div class="card-body">
                            <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control {{($errors->has('first_name'))?'is-invalid':''}}" value="{{old('first_name')}}" name="first_name" placeholder="Enter Employee first name...">
                                    @if($errors->has('first_name'))
                                       <p class="text-danger">{{$errors->first('first_name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control {{($errors->has('last_name'))?'is-invalid':''}}" value="{{old('last_name')}}" name="last_name" placeholder="Enter Employee last name...">
                                    @if($errors->has('last_name'))
                                       <p class="text-danger">{{$errors->first('last_name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control {{($errors->has('email'))?'is-invalid':''}}" value="{{old('email')}}" name="email" placeholder="Enter employee email...">
                                    @if($errors->has('email'))
                                       <p class="text-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control {{($errors->has('phone_number'))?'is-invalid':''}}" value="{{old('phone_number')}}" name="phone_number" placeholder="Enter company phone_number...">
                                    @if($errors->has('phone_number'))
                                       <p class="text-danger">{{$errors->first('phone_number')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select name="company_id" class="form-control  {{($errors->has('company_id'))?'is-invalid':''}}">
                                        <option value="">Choose a company</option>
                                        @foreach($companies as $company)
                                           <option value="{{$company->id}}" {{(old('company_id')==$company->id)?'selected':''}}>{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('project_category'))
                                       <p class="text-danger">{{$errors->first('project_category')}}</p>
                                    @endif
                                </div>

                                <div class="card-footer float-right">
                                    <a href="{{route('employee.index')}}" class="btn btn-danger">Cancel</a>
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