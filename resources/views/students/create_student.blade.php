
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
                                <h4 class="page-title">Add Student</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Home / Students / Add Student</li>
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
                                    <p class="sub-title">Add Information Students</p>
                                    <form action="{{url('add/student/save')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" type="text" id="last_name" placeholder="Enter last name">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" type="text" id="last_name" placeholder="Enter first name">
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Date of birth</label>
                                            <div class="col-sm-10">
                                            <input type="date" class="datepicker-default form-control @error('date_naissance') is-invalid @enderror" value="{{ old('date_naissance') }}" name="date_naissance" id="datepicker1" placeholder="Enter date of birth">
                                            @error('date_naissance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10">
                                            <input type="tel" class="datepicker-default form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Enter phone number">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Enter email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Photo</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar" id="avatar" multiple="">
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                               
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Parents Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('parentsName') is-invalid @enderror" name="parentsName" value="{{ old('parentsName') }}" type="text" id="parentsName" placeholder="Enter parentsName">
                                                @error('parentsName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">parents Mobile Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('parentsMobileNumber') is-invalid @enderror" name="parentsMobileNumber" value="{{ old('parentsMobileNumber') }}" type="tel" id="parentsMobileNumber" placeholder="Enter parents Mobile Number">
                                                @error('parentsMobileNumber')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" placeholder="Select gender">
                                                    <option selected disabled>Select sex</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                              
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">School</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('school_id') is-invalid @enderror" name="school_id" id="schools" placeholder="Select school" required>
                                                    <option value="">Select school</option>
                                                    
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
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Classe</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('classe_id') is-invalid @enderror" name="classe_id" id="classes" placeholder="Select classe">
                                                    <option value=''>Select classe</option>
                                                    
                                                </select>
                                                @error('classe_id')
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
   
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#schools").change(function(){
            var school_id = $(this).val();
            if(school_id == ""){
                $("#classes").html("<option value=''>Select classe</option>");
            }
            $.ajax({
                url:"get-classe/"+school_id,
                type:"GET",
                success:function(data){
                    var classes = data.classes;
                    var html = " <option value=''>Select classe</option>";
                    for(let i =0;i<classes.length;i++){
                        html += `
                        <option value="`+classes[i]['id']+`">`+classes[i]['name']+`</option>
                        `;
                    }
                    $("#classes").html(html);
                }
            });
        });
    });
</script>