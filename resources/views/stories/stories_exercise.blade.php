@extends('layouts.master-lay')

@section('page-name')

@php
$page="Stories-Guide";
@endphp

@endsection

@section('content')

<style>
  h3 {
    margin: 5px;
  }
  .progress {
    width: 100%;
    background-color: #2B4865;
    border-radius: 10px;
    margin: 18px 0px;
    height: 25px;
    margin-left:10%
  }

  .progress-bar {
    height: 100%;
    width: 60%;
    background-color: #38E54D;
    border-radius: 10px;
    position: relative;
    transition: all 1.5s;
  }

  .progress-bar span {
    position: absolute;
    top: 50%;
    right: 105%;
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
    background-color: #59CE8F;
    border-radius: 10px;
    position: relative;
    transition: all 1.5s;
  }

  .progress-bar1 h6 {
    position: absolute;
    right: 25%;
    top:80%;
    font-size: 25px;
  }
</style>


<div class="container">
  <div class="row "  style="justify-content: space-evenly;">
    <!----------------------------------------------------------->
    <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px">
    </div>
    <!------------------------------------------------------------>
    
    <!-------------------------------------------------------------------->
    <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px">
      <a href="{{route('story.read',$story->id)}}">
        <div class="events-items dental-care text-center  box-shadow">
          <div class="events-items-img">

            <img src="{{asset('file_storage/'.  $story->picture) }}" class="img-fluid" alt="Dental Care">

          </div>


          <div class="events-items-content">
            <h6>{{$story->name}}</h6>


          </div>
          
        </div>
      </a>
      <br>
       <!------------------bouton---------------------------------->
       <a href="{{route('story.read',$story->id)}}">
       
       <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"
       
       style="background-color:#6930C3;border-color:#6930C3; width:100%;font-size:30px ">
        {{__('messages.Read story now')}}
      </button>
        </a>
       <!--------------------------------------------------------->
      </div>

    <!----------------------------------------------------------------------->
  <!--------------------------------------------------------------------------------------->
  <div  class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px;">
    
    @if(Auth::user()->isStudent())
    
    <div class="events-items-content">
      
      @php 
      $avgStoryScore = number_format($avg->first()->avgStoryScore??0);
      @endphp 
        <p style="text-align: center; font-size:30px;color:#2B4865;">{{__('messages.Score Storie')}}</p>
      <div class="progress">
        <div class="progress-bar" style="width: {{($avgStoryScore)?$avgStoryScore:0}}%">
          <span style="color:#2B4865; border:2em">


            {{($avgStoryScore)?$avgStoryScore.' % ':''}}

          </span>
        </div>

      </div>


    
    </div>
  @endif

    </div>
  <!--------------------------------------------------------------------------------------->
  </div>
</div>
<div class="container">
  <div class="row">
    <h2 style="font-size: 28px; text-align: right;">{{__('messages.story activities')}} </h2>
    <br><br>
    
   @foreach($story->exercises as $exercise)
    <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInRight animated" style="padding-bottom: 20px">
      <div class="events-items dental-care text-center  box-shadow">
        <div class="events-items-img">
          <a 
          
          @if(Auth::user()->isTeacher() || $story->storyReads()->where('student_id',Auth::user()->student->id)->first())
    
          href="{{route('exercise.take',$exercise->id)}}"
          
          @else
          href="#"

          onclick="alert('Please read the story first');"

          @endif
          
          >
          <img src="{{asset('file_storage/'.  $exercise->picture) }}" class="img-fluid" alt="Dental Care">
          </a>
        </div>

        @if(Auth::user()->isStudent())
        
      @php 
      $score = Auth::user()->student->scores->where('exercise_id',$exercise->id);
     
      @endphp
    
        <div class="events-items-content">
          <a href="#">
            <p style="text-align: center; font-size:30px;color:#2B4865;">{{__('messages.Exercise Result')}}</p>
            <div class="progress1">
              <div class="progress-bar1" style="width:  {{(!$score->isEmpty())?number_format( $score->first()->score_student):0}}%;">
                <h6 style="color:#2B4865; border:1em;font-size:20px;"> {{(!$score->isEmpty())?number_format($score->first()->score_student)." % ":""}} </h6>
              </div>

            </div>
          </a>

        </div>
      @endif

      </div>
    </div>
    @endforeach
   
  </div>
</div>



@endsection