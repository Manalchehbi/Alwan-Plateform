@extends('layouts.master')

@section('content')
@include('layouts.dashboard_menu')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Schools</h1>
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('add/school/new')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('export/schools') }}" class="btn btn-sm btn-success" >
                <i class="fas fa-check"></i> Export To Excel
            </a>
        </div>
        
    </div>

</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All schools</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="20%">Id</th>
                        <th width="20%">Name</th>
                        <th width="20%">Logo</th>
                        <th width="20%">Adress</th>
                        <th width="15%">Mobile</th>
                        <th width="15%">Email</th>
                        <th width="10%">Action</th>
                    </tr>
                     @foreach ($school as $item)
                    <tr>
                         <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{asset('images/schools/'. $item->logo) }}" width="100px" alt="image"></td>
                        <td>{{ $item->adresse }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td style="display: flex"> 
                        <a href="{{ url('school/edit/'.$item->id) }}"
                        class="btn btn-primary m-2">
                        <i class="fa fa-pen"></i>
                          </a>
                          <a href="{{ url('deleteSchool/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
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