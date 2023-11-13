@extends('layouts.master')
@section('content')
@include('layouts.dashboard_menu')






 <!-- Left Sidebar Start -->

 <div class="content-page">
        <!-- Start content -->
        <div class="content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Useful Ressources </h1>
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('add/student/new')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
       
        
    </div>

</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Useful RessourcesList</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            
                <thead>
                    <tr>
                    <th width="20%">Name</th>
                        <th width="20%">Link</th>
                        
                        <th width="10%">Action</th>
                    </tr>
                    @foreach ($useful as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->link }}</td>
                        
                        <td style="display: flex"> 
                        <a href="{{ url('edit-useful/'.$item->id) }}"
                        class="btn btn-primary m-2">
                        <i class="fa fa-pen"></i>
                          </a>
                          <a href="{{ url('deleteUseful/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
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



