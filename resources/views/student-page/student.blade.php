@extends('layouts.master-lay')

@section('page-name')
     
   @php
      
     $page="Student-Page";    
   @endphp
    
   @endsection
    

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
<style>

.carre{
    width  : 50px;
    height : 30px;
    display: flex;
    color:  white;
    background-color: #6930C3;
    padding: 20px;
    align-items: center;
    font-size: 20px;
    margin-top:0%;
    border-radius: 15%;
    
}

.progress{
  width: 30%;
  background-color: #2B4865;
  border-radius: 10px;
  height: 15px;
  margin-top: 20px;
}
.progress-bar{

height: 100%;
width: 60%;
background-color: #2EB086;
border-radius: 10px;
position: relative;
transition: all 1.5s;


}

.progress-bar span{
  position: absolute;
  right: 0%;
  left:20%;
  top:170%;


}
.progress1 {
    width: 50%;
    background-color: #2B4865;
    border-radius: 10px;
    margin: 18px 0px;
    height: 15px;
    margin-left: 25%;
    margin-top:10%;
  }

.progress-bar1 {
    height: 100%;
    width: 60%;
    background-color: #38E54D;
    border-radius: 10px;
    position: relative;
    transition: all 1.5s;
  }

.progress-bar1 h6 {
    position: absolute;
    right: 25%;
    bottom: 70%;
    font-size: 50px;
  }

 
  </style>


<div class="container">
  <div class="row text-center">
      <!-- upper part -->
  <div class=" col-sm-12 col-md-12 col-lg-12">

     
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px;margin-top:10%">
             
             
            <!-----------------------------score-------------------------->
            <div class="card">
              <div class="card-body">
                <div class="row" style="justify-content: space-evenly; align-content:center">
                  
                  <p style="font-size: 20px;margin-top:10px">
                     {{__('messages.Number of read stories')}}
                   </p>
              
                        
                            <div class="carre">
                              {{$student->storyReads()->count()}}
                            </div>
                        
                 </div>
                <div class="row">

                  <p style="text-align: right; margin-top:15px; margin-left:15%">{{__('messages.Score of all stories')}}</p>
                  @php 
                  $avgStudentScore = number_format($avg->avg('avgStoryScore'));
                  @endphp 

                    <div class="progress" style="margin-left: 5%" >
                       <div class="progress-bar" style="width: {{($avgStudentScore)?$avgStudentScore:0}}%;">
                     <span style="color:#2B4865; border:1em"> {{($avgStudentScore)?$avgStudentScore.' %':""}} </span>
                        
        
                     </div>
                  </div>
                </div>
              </div>
            </div>  

            <!------------------------------------------------------------->
             
            

          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px">
             
            <!-----------------------------student card-------------------------->
            
              <div class="events-items dental-care text-center  box-shadow">
                 
                      <div class="events-items-img">
                        @if(Auth::user()->is_freetrial==false)
                          <a href="{{ url('editProfilStudent/'.$student->id) }}"><span id="boot-icon" class="bi bi-camera" style="font-size: 40px; color:black;margin-right:80%"></span></a>
                       
                       @endif
                          
                        <object data="{{ asset($student->avatar) }}"  class="img-fluid" type="image/png" >
                          <img src="{{asset('file_storage/'.$student->avatar) }}" alt="{{ $student->first_name }}"  class="img-fluid">
                        </object>
                          
                      </div>
                  
  
                 <div class="events-items-content">
                  <div class="row" style="justify-content: space-evenly;">
                      
          
                       <h6>{{ $student->first_name }}  {{ $student->last_name }}</h6>
            
            
                  
                  </div>
                      <h4>Classe : {{$student->classe->name}}</h4>
                 </div>
  
              </div>
          
            <!------------------------------------------------------------->


          </div>


            <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px;margin-top:10%">
             
                <!-----------------------------school logo-------------------------->
                
                    <div>      
                  <img src="{{ asset('images/schools/'.$student->school->logo) }}" class="img-fluid" alt="Dental Care" style="width:120px;hight:140px ">
                    </div>
              
                    
              <!------------------------------------------------------------->


            </div>
              
              

          </div>
      
  </div>


   <!--//////////////////////////  NEW /////////////////////////////////-->
              
  </div>
            
</div>

<div class="container">
  <!-- Lower Part -->
  <div class="row">

      @foreach($stories as $str)
      <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px">
      <div class="events-items dental-care text-center  box-shadow">
        <div class="events-items-img">
          <a href="{{ url('choice/'.$str->id) }}">
          <img src="{{asset('file_storage/'.  $str->picture) }}" class="img-fluid" alt="Dental Care">
          </a>
        </div>

       

        <div class="events-items-content">
          
          <h6>{{$str->name}}</h6>
			
              @php 
               $avgStoryScore =(!empty($avg->where('story_id',$str->id)->first()))?$avg->where('story_id',$str->id)->first()->avgStoryScore:0;
               $avgStoryScore =number_format($avgStoryScore);
      
              
              @endphp
            <div class="progress1">
              <div class="progress-bar1" style="width: {{($avgStoryScore)?$avgStoryScore:0}}%;">
                </div>
                <h6 style="color:#2B4865; border:1em; font-size:30px;bottom:70px">{{($avgStoryScore)?$avgStoryScore.' % ':''}}</h6>
            
            </div>
          

        </div>
      

      </div>
    </div>
      @endforeach

      
  </div>


  {{$stories->links()}} 
  <div>
        
      
 

   

  

@endsection