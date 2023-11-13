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
                                <h4 class="page-title">Update Teacher</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Home / Teacher/ Update Teacher</li>
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
                                    <h4 class="mt-0 header-title">Form Update Information</h4>
                                    <p class="sub-title">Update Information Teacher</p>
                                    <form action="{{url('update-teacher')}}" method="POST" enctype="multipart/form-data">
                                        
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$teacher->last_name }}" type="text" id="name" placeholder="Enter Last name">
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
                                            <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$teacher->first_name }}" type="text" id="first_name" placeholder="Enter First name">
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
                                                <input class="form-control @error('description') is-invalid @enderror" name="adresse" value="{{$teacher->adresse }}" type="textarea" id="adresse" placeholder="Enter Adresse">
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
                                                <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{$teacher->email }}" name="email" id="email" placeholder="enter Email">
                                               
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                <!-------------------------------------------------------------------------------------------->
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-10">
                                        <object data="{{ asset($teacher->picture) }}"  class="img-fluid member-image" type="image/png">
                                            <img src="{{asset('file_storage/'.$teacher->picture) }}" alt="{{ $teacher->first_name }}"  class="img-fluid member-image">
                                          </object>
                                     
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Photo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('picture') is-invalid @enderror"   type="file" name="picture" id="picture" multiple="">
                                       
                                    </div>
                                </div>
                                        
                               <!------------------------------------------------------------------------------------------------->
                               <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                <input type="tel" class="datepicker-default form-control @error('phone') is-invalid @enderror" value="{{$teacher->phone }}" name="phone" id="phone" placeholder="Enter phone number">
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
        <select class="form-control @error('Gender') is-invalid @enderror"  name="gender"  id="gender" placeholder="Select gender">
            
            <option value="Male" {{$teacher->gender=="Male"?'selected':''}}>Male</option>
            <option value="Female" {{$teacher->gender=="Female"?'selected':''}}>Female</option>
      
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
                                                    
                                                    @foreach($specialities as $speciality)
                                                    <option value="{{$speciality->id}}" {{$speciality->id==$teacher->speciality_id?'selected':''}}>{{$speciality->name}}</option>
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

                                                    @foreach($schools as $school)
                                                    <option value="{{$school->id}}" {{$school->id==$teacher->school_id?'selected':''}}>{{$school->name}}</option>
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
                                                         @foreach($classes as $classe)
                                                    <option value="{{$classe->id}}" {{$teacher->classes()->pluck('classe_id')->contains($classe->id)?'selected':''}}>{{$classe->name}}</option>
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