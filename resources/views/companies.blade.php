@extends('master.app')
@section('title','companies')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Companies</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <a href="{{route('company.create')}}" class="btn btn-success">Create Company</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($companies as $company)
                                <tr>
                                  <td>{{$company->name}}</td>
                                  <td>{{$company->email}}</td>
                                  <td>{{$company->website}}</td>
                                  <td>
                                  <img src="{{ asset('storage/'.$company->logo) }}" width="100px" height="100px" alt="" title=""></a>
                                </td>
                                <td>
                                <form method="POST" class="form-inline " action="{{route('company.destroy',$company->id)}}">
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