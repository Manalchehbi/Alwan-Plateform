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
                                <h4 class="page-title">Add Teacher</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Home / Teacher/ Add Teacher</li>
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
                                    <form action="{{url('insert-teacher')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" type="text" id="name" placeholder="Enter Last name">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
<!---------------------------------------------------------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Fist Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" type="text" id="first_name" placeholder="Enter First name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> Adresse </label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('description') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" type="textarea" id="adresse" placeholder="Enter Adresse">
                                                @error('adresse')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="enter Email">
                                               
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                <!-------------------------------------------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Picture</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('picture') is-invalid @enderror" type="file" name="picture" id="picture" multiple="">
                                                @error('picture')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                               <!------------------------------------------------------------------------------------------------->
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

<!----------------------------------------------------------------------------------------------------------------------------------------->
                    
<div class="form-group row">
    <label for="example-tel-input" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
        <select class="form-control @error('Gender') is-invalid @enderror" name="gender" id="gender" placeholder="Select gender">
            <option selected disabled>Select Gender</option>
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

         <!------------------------------------------------------------------->
                                        <div class="form-group row  mt-100">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Speciality</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('type_id') is-invalid @enderror"  name="speciality_id" id="specialities" placeholder="Select Speciality">
                                                    <option value="">Select speciality</option>
                                                    @foreach($specialities as $speciality)
                                                    <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('type_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                <!------------------------------------------------------------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">School</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('academic_level_id') is-invalid @enderror" name="school_id" id="schools" placeholder="Select academic_level">
                                                    <option value>Select school</option>
                                                    
                                                    @foreach($schools as $school)
                                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('school')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Classe</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('classe_id') is-invalid @enderror" name="classe_id[]" id="classes" placeholder="Select classes" multiple>
                                                    <option selected disabled>Select Classe</option>
                                                    
                                                    @foreach($classes as $classe)
                                                    <option value="{{$classe->id}}">{{$classe->name}}</option>
                                                    @endforeach
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
    
    var multipleCancelButton = new Choices('#classes', {
       removeItemButton: true,
       maxItemCount:5,
       searchResultLimit:5,
       renderChoiceLimit:5
     }); 
    
    
});
</script>




    @endsection