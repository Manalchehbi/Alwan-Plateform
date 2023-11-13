@extends('layouts.master')
@section('content')
@include('layouts.dashboard_menu')
 <!-- Left Sidebar Start -->

<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center ">
                        <div class="col-md-8">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Useful Ressource</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active"></li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right d-none d-md-block app-datepicker">
                                <input type="text" class="form-control" data-date-format="MM dd, yyyy" readonly="readonly" id="datepicker">
                                <i class="mdi mdi-chevron-down mdi-drop"></i>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <div class="page-heading">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Form Add New Useful Ressource</h4>
                                    <p class="sub-title"></p>
                                    <form action="{{url('insert-useful')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                       
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> name </label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" multiple="">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">past a link of  video</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" id="link" multiple="">
                                                @error('link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                       
                               
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light" onclick=save()>Save</button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Cannel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page-title -->
            </div>
            <!-- container-fluid -->
        </div>
    </div>
   
    @endsection