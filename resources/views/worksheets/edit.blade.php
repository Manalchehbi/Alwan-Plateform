@extends('layouts.master')
@section('content')
@include('layouts.dashboard_menu')
 <!-- Left Sidebar Start -->

<div class="content-page">

        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
                    <div class="row align-items-center ">
                        <div class="col-md-8">
                            <div class="page-title-box">
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
                                    <h4 class="mt-0 header-title">Update Worksheet</h4>
                                    <a href="{{ route('worksheets/All_worksheet') }}" class="btn btn-primary">All worksheets</a>

                                    <p class="sub-title"></p>
                                    <form action="{{ url('update-work/'.$works->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                       
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">PDF Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('pdf_title') is-invalid @enderror" type="text" name="pdf_title" value="{{$works->title}}" id="pdf_title" >
                                              
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">workSheet Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" placeholder="Select category">
                                                     @if($works->category!==null)
                                                    <option selected value="{{$works->category->id}}" >{{$works->category->name}}</option>
                                                    @endif
                                                   
                                                    @foreach($workSheetCategories as $atem)
                                                    <option value="{{$atem->id}}">{{$atem->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Import a new worksheet</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('pdf') is-invalid @enderror" type="file" name="pdf" value="{{$works->name}}" id="pdf" multiple="">
                                              
                                            </div>
                                        </div>
                                        
                               
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Update Worksheet</button>

                                              
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






