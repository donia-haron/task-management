@extends('master.app')
@section('title','employees')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">employees</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <a href="{{route('employee.create')}}" class="btn btn-success">Create Employee</a>
                    </div>
                </div>
              </div>
              @if(Session::has('message'))
                 <p class="alert alert-success">{{Session::get('message')}}</p>
              @endif
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card p-4">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped card-table table-vcenter text-nowrap">
                            <thead>
                              <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>company Name</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($employees as $employee)
                                <tr>
                                  <td>{{$employee->first_name}}</td>
                                  <td>{{$employee->last_name}}</td>
                                  <td>{{$employee->email}}</td>
                                  <td>{{$employee->phone_number}}</td>
                                <td>
                                        @foreach($companies as $company)
                                        @if($employee->company_id==$company->id)
                                        {{$company->name}}  
                                        @endif 
                                        @endforeach

                                </td>
                                <td>
                                <form method="POST" class="form-inline " action="{{route('employee.destroy',$employee->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">delete</button>
                    </form>
</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                  </div>
                </div>
              </div>              
            </div>            
          </div>
      </div>
    @endsection