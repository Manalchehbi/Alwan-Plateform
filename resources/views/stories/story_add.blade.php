@extends('layouts.master')
@section('content')
@include('layouts.dashboard_menu')
 <!-- Left Sidebar Start -->


 <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
.mt-100{margin-top: 100px}
body{
    background: #242d3e;
    background: -webkit-linear-gradient(to right,#242d3e,#242d3e);
    background: linear-gradient(to right, #242d3e,#242d3e);
  color: #514B64;
  min-height: 100vh}
.card-body{
    background:#2c3749;
}
.card-body label{
    color: aliceblue;
}
</style>


<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center ">
                        <div class="col-md-8">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Story</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Home / Story/ Add Story</li>
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
                                    <p class="sub-title">Add Information Story</p>
                                    <form action="{{url('insert-storie')}}" method="POST" enctype="multipart/form-data">
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
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> Description</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" type="textarea" id="description" placeholder="Enter description">
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Path</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('path') is-invalid @enderror" type="file" name="path" id="path" multiple="">
                                               
                                                @error('path')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Photo</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('picture') is-invalid @enderror" type="file" name="picture" id="picture" multiple="">
                                                @error('picture')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                               
                                        <div class="form-group row  mt-100">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Type</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('type_id') is-invalid @enderror"  name="type_id[]" id="types" placeholder="Select type" multiple>
                                                    <option value="">Select Type</option>
                                                    @foreach($types as $otem)
                                                    <option value="{{$otem->id}}">{{$otem->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('type_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Academic Level</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('academic_level_id') is-invalid @enderror" name="academic_level_id[]" id="academics" placeholder="Select academic_level" multiple>
                                                    <option value>Select Academic Level</option>
                                                    
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
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Difficulty Level</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('difficulty_level_id') is-invalid @enderror" name="difficulty_level_id" id="difficultyl" placeholder="Select difficulty_level">
                                                    <option selected disabled>Select Difficulty Level</option>
                                                    
                                                    @foreach($difficulty_levels as $atem)
                                                    <option value="{{$atem->id}}">{{$atem->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('difficulty_level')
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
<script>
$(document).ready(function(){
    
    var multipleCancelButton = new Choices('#types', {
       removeItemButton: true,
       maxItemCount:5,
       searchResultLimit:5,
       renderChoiceLimit:5
     }); 
    
    
});
</script>
<script>
$(document).ready(function(){
    
    var multipleCancelButton = new Choices('#academics', {
       removeItemButton: true,
       maxItemCount:5,
       searchResultLimit:5,
       renderChoiceLimit:5,
     }); 
    
    
});
</script>



    @endsection