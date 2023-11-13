@extends('layouts.master-lay')

@section('page-name')
     
   @php
     $page="details-Page";    
   @endphp
    
   @endsection
    

@section('content')
<style>
  img.img-fluid.member-image {
    width: 406px;
    height: 271px;
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

</style>


<div class="container">
  <div class="row text-center">
      <!-- upper part -->
  <div class=" col-sm-12 col-md-12 col-lg-12">

     
      <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px">
             
            <!-----------------------------guide story-------------------------->
          

            <!------------------------------------------------------------->


          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px">
             
            <!-----------------------------guide story-------------------------->
            

            <!------------------------------------------------------------->


          </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mt-12 text-center" style="padding-bottom: 20px; margin-top: 10px">
             
                <!-----------------------------user=student-------------------------->
              <div class="team-members team-members-index2 team-member1">
                  <div class="team-member-img">
                    <object data="{{ asset($student->avatar) }}"  class="img-fluid member-image" type="image/png">
                      <img src="{{asset('file_storage/'.$student->avatar) }}" alt="{{ $student->first_name }}"  class="img-fluid member-image">
                    </object>
                      
                  </div>
                  <div class="team-members-content team-members-content-index2 text-center">
                    <div class="row" style="justify-content: space-evenly;">
                      
          
                      <h6>{{ $student->first_name }}   {{ $student->last_name }}</h6>
           
                 
                    </div>

                      


                      <h4>Classe : {{$student->classe->name}}</h4>
                      

                  </div>
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

      @foreach($stories as $story)
      <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px">
          <div class="events-items dental-care text-center  box-shadow">
            <a href="{{ url('choice/'.$story->id) }}">
                  <div class="events-items-img">
                    <img src="{{asset('file_storage/'.  $story->picture) }}" class="img-fluid" alt="Dental Care">
                  </div>
            </a>

              <div class="events-items-content">
                  <a href="#">

                      <h6>{{$story->name}}</h6>
                      <br><br>
                  </a>
                  <!--------------------------------chart---------------------------------------------------->
                  @php 

                  $avgScoreType1 = (isset($avg[1]))?$avg[1]->where('story_id',$story->id)->where('student_id',$student->id)->avg('avgTypeScore'):'';
                  $avgScoreType1 = ($avgScoreType1)?number_format($avgScoreType1):-1;
                  $avgScoreType2 = (isset($avg[2]))?$avg[2]->where('story_id',$story->id)->where('student_id',$student->id)->avg('avgTypeScore'):'';
                  $avgScoreType2 = ($avgScoreType2)?number_format($avgScoreType2):-1;
                  $avgScoreType3 =(isset($avg[3]))?$avg[3]->where('story_id',$story->id)->where('student_id',$student->id)->avg('avgTypeScore'):'';
                  $avgScoreType3 = ($avgScoreType3)?number_format($avgScoreType3):-1;
                   
                  @endphp
                  
                  
                   <!-----------------------------------chart---------------------------------------------------------->

<div style="display:flex;justify-content: space-between;margin-top:10px">
  <div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType3}}; --primary:#FBCB0A;"></div> 
  <div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType2}}; --primary:#27B1BE;"></div> 
  <div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType1}};--primary:#FF4949;" ></div>
</div>

<!--------------------------------------------------------------------------------------->
  
              
              </div>
          </div>
      </div>
      @endforeach

      
  </div>


  {{$stories->links()}} 
<div>
        
      
 

   

  

@endsection