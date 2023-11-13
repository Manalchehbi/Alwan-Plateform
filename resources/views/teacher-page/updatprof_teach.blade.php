@extends('layouts.master-lay')

@section('page-name')
     
   @php
     $page="ProfilTeacher-Page";    
   @endphp
    
   @endsection

        
@section('content')
<style>
[type=radio] {
  position: absolute;
  opacity: 0;
}

[type=radio]+img {
  cursor: pointer;
  margin-right: 0.5rem;
}

[type=radio]:checked + img {
  outline: 5px solid orange;
}
</style>
<div class="container">
   
  <div class="row" style="justify-content: space-evenly; margin-bottom:30px;">
     
    <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px;margin-top:40px">
    <!-----------------------------guide story-------------------------->
    <h6 class="m-0 font-weight-bold text-primary" style="margin-top:30%;font-size:50px">Update Profil</h6>
          
    <!------------------------------------------------------------->
    </div>
                   
          
  
  
    
      
  </div>
<!----------------------------------------------------------------->
</div>
<!----------------------------------------------------->
<div class="container">
  <div class="row" style="justify-content: space-evenly; margin-bottom:30px;">
       <h6 style="font-size:30px"> {{__('messages.Images to choose from:')}} </h6>
  </div>

<!---------------------------------------------------------------->
</div>
 <!------------------------------------------------------------------>
<div class="row" style="display:flex;align-content:center;justify-content: space-evenly;">

<form action="{{route('updatProfil')}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $teacher->id }}">         
<!-----------------------------guide story-------------------------->


  <label>
    <input type="radio" name="picture" value="images/avatar-teacher/te1.png" checked>
    <img src="{{asset('images/avatar-teacher/te1.png')}}">
  </label>

  <label>
    <input type="radio" name="picture" value="images/avatar-teacher/te2.png">
    <img src="{{asset('images/avatar-teacher/te2.png')}}">
  </label>

  <label>
    <input type="radio" name="picture" value="images/avatar-teacher/te3.png">
    <img src="{{asset('images/avatar-teacher/te3.png')}}">
  </label>
  <label>
    <input type="radio" name="picture" value="images/avatar-teacher/te4.png">
    <img src="{{asset('images/avatar-teacher/te4.png')}}">
  </label>


<!------------------------------------------------------------->

</div>

<!-------------------------------------------------------------------------->
<div class="row" style="display:flex; align-content:center;justify-content: space-evenly;margin-bottom:30px">

     
<!-----------------------------guide story-------------------------->


<label>
<input type="radio" name="picture" value="images/avatar-teacher/tea1.png" checked>
<img src="{{asset('images/avatar-teacher/tea1.png')}}">
</label>

<label>
<input type="radio" name="picture" value="images/avatar-teacher/tea2.png">
<img src="{{asset('images/avatar-teacher/tea2.png')}}">
</label>

<label>
<input type="radio" name="picture" value="images/avatar-teacher/tea3.png">
<img src="{{asset('images/avatar-teacher/tea3.png')}}">
</label>
<label>
<input type="radio" name="picture" value="images/avatar-teacher/tea4.png">
<img src="{{asset('images/avatar-teacher/tea4.png')}}">
</label>


<!------------------------------------------------------------->

</div>

<!-------------------------------------------------------------------------->

<div class="container">
<div class="row" style="justify-content: space-evenly; margin-bottom:30px;">
 <!-----------------------------guide story-------------------------->
 <h6 style="font-size:30px"> {{__('messages.Choose file:')}}</h6>
      
 <!------------------------------------------------------------->
</div>
</div>
<div class="container">
<div class="row text-center" style="justify-content: space-evenly; margin-bottom:30px;">
  <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px;margin-top:40px">
               
          <!-----------------------------guide story-------------------------->
        
          
   
            <div class="col-sm-10" style="margin-left:10%; margin-top:20px; font-size:40px; margin-bottom:50px">
                <input   type="file" name="picture" id="avatar" multiple="">
               
            </div>
            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
  
      <button type="submit"style=" width: 130px;hight:70px" class="btn btn-success waves-effect waves-light" onclick=save()>Save</button>
      <button type="reset" style=" width: 130px;hight:70px" class="btn btn-danger waves-effect waves-light">Cannel</button>
  
      
          
        
          <!------------------------------------------------------------->
  
  
  </div>
 
               
     
  
  
  
  
  </div>
<!-------------------------------------------------------------------------------->
</form>
@endsection


