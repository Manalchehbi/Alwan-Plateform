@extends('layouts.master')

@section('content')
@include('layouts.dashboard_menu')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('new_teacher') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('export/teachers') }}" class="btn btn-sm btn-success" >
                <i class="fas fa-check"></i> Export To Excel
            </a>
        </div>
        
    </div>

</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All teachers</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="20%">First Name</th>
                        <th width="20%">Last Name</th>
                        <th width=25%> Picture</th>
                        <th width="15%">Email</th>
                        <th width="15%">Mobile</th>
                        <th width="10%">Action</th>
                    </tr>
                     @foreach ($teacher as $teach)
                    <tr>
                        <td>{{ $teach->last_name }}</td>
                        <td>{{ $teach->first_name }}</td>
                        <td><object data="{{ asset($teach->picture) }}"  class="img-fluid member-image" type="image/png">
                            <img src="{{asset('file_storage/'.$teach->picture) }}" alt="{{ $teach->first_name }}"  class="img-fluid member-image">
                          </object></td>
                        <td>{{ $teach->email }}</td>
                        <td>{{ $teach->phone }}</td>
                        <td style="display: flex"> 
                        <a href="{{ url('edit-teacher/'.$teach->id) }}"
                        class="btn btn-primary m-2">
                        <i class="fa fa-pen"></i>
                          </a>
                          <a href="{{ url('deleteTeacher/'.$teach->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
                            <span class="btn btn-sm btn-danger" style="width:40px;hight:60px; margin-top:7px">
                            <i class="fas fa-trash">
                            </i>
                          </span>
                      </a>
                    </td>
                    </tr>
                    @endforeach
                </thead>
               
            </table>

        </div>
    </div>
</div>

</div>
                        
                    </div>
                </div>
                
   
    @endsection