@extends('layouts.master')

@section('content')
@include('layouts.dashboard_menu')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center ">
                        <div class="col-md-8">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Classe</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Home / Classes / Add Classe</li>
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
                                    <h4 class="mt-0 header-title">Form Add New Information</h4>
                                    <p class="sub-title">Add Information classes</p>
                                    <form action="{{route('save/classe/new')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" id="name" placeholder="Enter name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Academic Level</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('academic_level_id') is-invalid @enderror" name="academic_level_id" id="academic_level_id" placeholder="Select academic_level">
                                                    <option selected disabled>Select Academic Level</option>
                                                    
                                                    @foreach($academic_levels as $atem)
                                                    <option value="{{$atem->id}}">{{$atem->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('academic_level')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">School</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('school_id') is-invalid @enderror" name="school_id" id="school_id" placeholder="Select school">
                                                    <option selected disabled>Select school</option>
                                                    
                                                    @foreach($schools as $school)
                                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('school_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
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