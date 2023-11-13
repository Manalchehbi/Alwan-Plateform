@extends('layouts.master')

@section('content')
@include('layouts.dashboard_menu')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Speciality</h1>
    <div class="row">
       
       
        
    </div>

</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All specialities</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th> Name</th>
                    </tr>
                     @foreach ($specialities as $speciality)
                    <tr>
                        <td>{{ $speciality->id }}</td>
                        <td>{{ $speciality->name }}</td>
                       
                       
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