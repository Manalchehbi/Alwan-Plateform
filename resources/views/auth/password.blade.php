@extends('layouts.master')

@section('content')
@include('layouts.dashboard_menu')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Passwords</h1>
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="col-md-6">
            <a href="#" class="btn btn-sm btn-success" >
                <i class="fas fa-check"></i> Export To Excel
            </a>
        </div>
        
    </div>

</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Passwords</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="20%">Email</th>
                        <th width="20%">Password</th>
                        <th width="10%">Action</th>
                    </tr>
                     @foreach ($passwords as $item)
                    <tr>
                        <td>{{ $item->user->email}}</td>
                        <td>{{ $item->password }}</td>
                        <td style="display: flex"> 
                        <a href="#"
                        class="btn btn-primary m-2">
                        <i class="fa fa-pen"></i>
                          </a>
                          <a href="#" onclick="return confirm('Are you sure to want to delete it?')">
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