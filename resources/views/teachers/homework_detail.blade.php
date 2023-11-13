@extends('layouts.master-lay')

@section('page-name')
     
   @php
      $page="HomeworkDetail-Page";   
   @endphp
    
   @endsection
    

@section('content')

<style>
.bar{
   width: 100%;
    margin: 18px 0px;
    
    margin-left: 20%;
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
  @keyframes progress {
  0% { --percentage: 0; }
  100% { --percentage: var(--value); }
}

 --percentage {
  syntax: '<number>';
  inherits: true;
  initial-value: 0;
}

[role="progressbar"] {
  --percentage: var(--value);
  
  --content: var(--value);
  
  --secondary: #2B4865;
  --size: 65px;
  animation: progress 2s 0.5s forwards;
  width: var(--size);
  aspect-ratio: 2 / 1;
  border-radius: 50% / 100% 100% 0 0;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: flex-end;
  justify-content: center;

}

[role="progressbar"]::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: conic-gradient(from 0.75turn at 50% 100%, var(--primary) calc(var(--percentage) * 1% / 2), var(--secondary) calc(var(--percentage) * 1% / 2 + 0.1%));
  mask: radial-gradient(at 50% 100%, white 55%, transparent 55.5%);
  mask-mode: alpha;
  -webkit-mask: radial-gradient(at 50% 100%, #0000 55%, #000 55.5%);
  -webkit-mask-mode: alpha;
}

[role="progressbar"]::after {
  counter-reset: percentage var(--value);
  content: counter(percentage) '%';
  opacity: calc(var(--value) + 1);
  font-family: Helvetica, Arial, sans-serif;
  font-size: calc(var(--size) / 5);
  color: var(--secondary);
  border: 20px;
  

}


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

.boxscore{
    width  : 500px;
    height : 50px;
    display: flex;
    color:  white;
    background-color: #6930C3;
    padding: 30px;
    align-items: center;
    justify-items: center;
    font-size: 20px;
    margin-top:40%;
    text-align: center;
    margin-left: 20%;
    border-radius: 5px;

}
</style>

<div class="container">
 <div class="row" style="justify-content:space-evenly">
<!----------------------------------------------------------------->

<!----------------------------------------------------------------->
<!----------------------------------------------------------------->
<div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px">
  <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"
       
  style="background-color:#6930C3;border-color:#6930C3; width:100%;font-size:30px;margin-top:10% ">
  {{$homework->classe->name}}     {{__('messages.Classe:')}}
 </button>
 <br><br>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="progress1" style="width:110px; height:18px;margin-left:30%">
        <div class="progress-bar1">
          </div>
          <h6 style="color:#2B4865; border:1em;bottom:70px"></h6>
          
      </div>


    </div>
    <div class="row">
     <div class="bar">
      <h6 style="align-content: center">{{__('messages.The result is as shown to the student')}} </h6>
     </div>
    </div>
  </div>
</div>


</div>
<!----------------------------------------------------------------->
<!----------------------------------------------------------------->

<div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px; margin-top:20px">
    <div class="events-items dental-care text-center  box-shadow">
      <div class="events-items-img">
        
        <img src="{{asset('file_storage/'. $homework->story->picture) }}" class="img-fluid" alt="Dental Care">
        
      </div>
      <div class="events-items-content">
        <a href="#">
            <h6>{{$homework->story->name}}</h6>
        </a>
    </div>
    </div>
</div>
<!----------------------------------------------------------------->
 </div>
</div>


<!-- Classes Section -->
<section style="background-color: transparent" class="section-wrapper">
    <div class="container"> 
     <!--//////////////////////////  STUDENT * 2 for demo purposes /////////////////////////////////-->
        <div class="row ">
                       @foreach($homework->classe->students as $student)
                                <div class="col-sm-4 col-sm-12 col-md-6 col-lg-3 py-3 wow fadeInUp animated" data-wow-delay="200ms">
                                    <div class="classes-items classes-items-index2 standard-learning text-center">
                                       
                                            <div class="classes-items-img">
                                                <div class="row text-center" style=" justify-content:space-evenly;">
                                                    
                                        
                                                <h6 >{{ $student->first_name }} {{ $student->last_name }}</h6>
                                                </div>
                                                <object data="{{ asset($student->avatar) }}"  class="img-fluid member-image" type="image/png">
                                                  <img src="{{asset('file_storage/'.$student->avatar) }}" alt="{{ $student->first_name }}"  class="img-fluid member-image">
                                                </object>
                                                
                                            </div>
                                        </a>
                            <div class="classes-items-content">
                                         
                                    <div class="row" style="justify-content:space-evenly;"  >
                                            
                                        <p style="font-size: 20px; ">
                                            {{__('messages.Number of read stories')}}
                                                 </p>
                                            
                                        
                                                <div class="carre">
                                                    {{$student->storyReads()->where('story_id', $homework->story_id)->first()->repitition ?? 0}}
                                                 </div>
                                  
                                    </div>
                                        
            
<!--------------------------------chart---------------------------------------------------->
@php 
$avgScoreType = $avgByExerciseType->where('student_id',$student->id);
$avgScoreType1 = $avgScoreType->where('exetype_id',1)->avg('avgTypeScore');
$avgScoreType1 = ($avgScoreType1)?number_format($avgScoreType1):-1;
$avgScoreType2 = $avgScoreType->where('exetype_id',2)->avg('avgTypeScore');
$avgScoreType2 = ($avgScoreType2)?number_format($avgScoreType2):-1;
$avgScoreType3 = $avgScoreType->where('exetype_id',3)->avg('avgTypeScore');
$avgScoreType3 = ($avgScoreType3)?number_format($avgScoreType3):-1;
 
@endphp
  <!-----------------------------------chart---------------------------------------------------------->

<div style="display:flex;justify-content: space-between;margin-top:10px">
<div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType3}}; --primary:#FBCB0A;"></div> 
<div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType2}}; --primary:#27B1BE;"></div> 
<div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType1}};--primary:#FF4949;" ></div>
</div>
<!--------------------------------------------------------------------------------------->
                
                <!-----------------------------------------endchart--------------------------------------->
                <!-----------------------------------chart---------------------------------------------------------->
                 @php 

                  $avgStudentScore = $avgByStoryAndStudent->where('student_id',$student->id)->first()->avgStoryScore;
			@endphp
                <div class="progress1">
                    <div class="progress-bar1" style="width:{{$avgStudentScore ?? 0}}px">
                      </div>
                      <h6 style="color:#2B4865; border:1em; font-size:30px;bottom:70px">{{($avgStudentScore)?number_format($avgStudentScore).'%':'' }}</h6>
                  
                  </div>
            
            
            <!-----------------------------------------endchart--------------------------------------->
                                                          
                             </div>
                                       
                                
                
                                        
                                    </div>
                                </div>
                            
                               
                            @endforeach    
                     
                        </div>
                
                
 <!--//////////////////////////////////////////////////////////-->
            </div>
</section>
                
                
                   <!--///////////////////////////////////////////////////////////-->
                
                

@endsection