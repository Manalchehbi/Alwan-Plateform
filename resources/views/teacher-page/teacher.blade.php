@extends('layouts.master-lay')

@php
//dd($avg[1]->unique('story_id'));
@endphp

@section('links')
     
       <!-- Favicon -->
    
       <link rel="shortcut icon" href="{{asset('img/fav-icon/logo_favicon.png')}}"  type='image/x-icon'> 
       <!-- Google Fonts-->
       <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400&display=swap" rel="stylesheet">
       <!-- Font Awesome CSS-->
       <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
       <!--Bootstrap CSS-->
       <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
       <!-- WOW CSS -->
       <link rel="stylesheet" href="{{asset('vendor/wow/css/wow.min.css')}}">
       <!--Owl Carousel Css-->
       <link rel="stylesheet" href="{{asset('vendor/owl-carousel/css/owl.carousel.min.css')}}">
       <!-- Magnific Popup CSS -->
       <link rel="stylesheet" href="{{asset('vendor/magnific-popup/css/magnific-popup.css')}}">
       <!-- Custom CSS -->
       <link rel="stylesheet" href="{{asset('css/style.css')}}">
       <!-- Color CSS -->
       <link rel="stylesheet" href="{{asset('css/color.css')}}">
       <!-- Responsive CSS -->
       <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
   
       <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
       
    
   @endsection


@section('page-name')
     
   @php
     $page="Teacher-Page";    
   @endphp
    
   @endsection
    
@section('title')

{{__('messages.Teacher Page')}}

@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
<style>



      .chartBox {
        width: 480px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px #27b2d5;
        background: white;
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
    justify-content:center;
    

    
}





.boxscore{
    width: 100%;
    display: flex;
    color: black;
    background-color: white;
    padding: 20px;
    text-align: right;
    font-size: 20px;
    justify-content: space-between;

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
[role="progressbar1"] {
  --percentage: var(--value);
  
  --secondary: #2B4865;
  --size: 80px;
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

[role="progressbar1"]::before {
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

[role="progressbar1"]::after {
  counter-reset: percentage var(--value);
  font-family: Helvetica, Arial, sans-serif;
  font-size: calc(var(--size) / 5);
  color: var(--secondary);
}


</style>
<!------------------------------container-------------------------------------------------------------------------------------------------------------------------------->
<div class="container">
<div class="row text-center">
<!----------------------------------------clé----------------------------------------------------------->
    <div class="col-sm-12 col-md-6 col-lg-4 py-3 text-center" style="padding-bottom: 20px; margin-top:12%">
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col">
                       <!-------------------------------->
                       <h2 style="padding-top: 15px;font-size:23px;">{{__('messages.comprehension result')}}</h2>
                        <h2 style="padding-top: 15px;font-size:23px;">{{__('messages.language skills')}}</h2>
                        <h2 style="padding-top: 15px;font-size:23px;">{{__('messages.dictionary')}}</h2>
                        
                       <!----------------------------->
                    </div>
                    <div class="col" >
                        <div role="progressbar1" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="--value: 80;  --primary:#FF4949;"></div> 
                        <div role="progressbar1" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="--value: 65; --primary:#27B1BE;"></div> 
                        <div role="progressbar1" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="--value: 33;--primary:#FBCB0A;" ></div>
                         
                    </div>

                </div>
            </div>
          </div>
    </div>
<!------------------------------------------------------------------------------------------------------->
    <div class="col-sm-12 col-md-6 col-lg-4 py-3 text-center" style="padding-bottom: 20px">
        <!-----------------------------user=teacher-------------------------->
        <div class="events-items dental-care text-center  box-shadow">
                
            <div class="events-items-img">
             
          <h6>{{ $teacher->first_name }}   {{ $teacher->last_name }}</h6>
              
              <object data="{{ asset($teacher->picture) }}"  class="img-fluid member-image" type="image/png">
                <img src="{{asset('file_storage/'.$teacher->picture) }}" alt="{{ $teacher->first_name }}"  class="img-fluid member-image">
              </object>
             
            </div>
        
            <div class="events-items-content" >
            @if(Auth::user() && Auth::user()->isTeacher())

        
           
              <a href="{{ url('editProfilTeacher/'.$teacher->id) }}"><span id="boot-icon" class="bi bi-camera" style="font-size: 30px; color: black;margin-left:20px"></span></a>
              
            
            @endif
          </div>
       
                
    </div>

        <!------------------------------------------------------------->
    </div>
<!------------------------------------------school logo------------------------------------------------------------------->
            
   <div  class="col-sm-12 col-md-6 col-lg-4 py-3 text-center"  style="padding-bottom: 20px;margin-top:15%">      
    <img src="{{ asset('images/schools/'.$teacher->school->logo) }}" class="img-fluid" alt="Dental Care" style="width:120px;hight:140px ">
      </div>

<!------------------------------------------------------------------------------------------------------------------------->
</div>
</div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container">
    <div class="row text-center" style="justify-content: space-evenly; align-content:center">
        <!-- upper part -->
    

       
                
                
                
            <!--------------------------select classes------------------------>
            <form action="{{route('teacher-page')}}">
              <div class="row" >
                <button type="submit" name="search" class="btn btn-primary" style= "height:50px"> <i class="fa fa-search"></i></button>
              <div class="col">
         
              <div dir="rtl" lang="ar" class="form-group row" style="width:230px;">
                      
                <input class="form-control" style="padding:25px 20px 25px 20px; border-radius:5px"  type="text" id="searchQuery" name='searchQuery' placeholder="{{__('messages.Enter student name')}}" >
                
              </div>
          
              
              
            </div>
              @csrf
              <div class="col">
                <select class="round" name="searchclasse" id="id_classe">
                    <option value="">{{__('messages.My classes')}}</option>
                    @foreach($classes as $classe)
                    @if($classe->id==$class)
                    <option selected  value="{{$classe->id}}">
                    <a>{{ $classe->name }}</a>
                </option>
                    @else
                    <option  value="{{$classe->id}}">
                        <a>{{ $classe->name }}</a>
                    </option>
                    @endif
                    @endforeach
                </select>
              </div>

               
            
            </div>            
              </form>
            <!--------------------------------------------------------------->
            

            


    <!--//////////////////////////  NEW /////////////////////////////////-->
          
        </div>
        
    </div>


    
        

   <!--//////////////////////////  NEW /////////////////////////////////-->




                <!-- Classes Section -->
<section style="background-color: transparent" class="section-wrapper">
    <div class="container"> 
   <!--//////////////////////////  STUDENT * 2 for demo purposes /////////////////////////////////-->
            <div class="row ">
      
        @foreach($students as $student)
                <div class="col-sm-4 col-sm-12 col-md-6 col-lg-3 py-3 wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="classes-items classes-items-index2 standard-learning text-center">
                       
                          <div class="classes-items-img">
                                <div class="row text-center" style=" justify-content:space-evenly;">
                                    
                        
                                     <h6 >{{ $student->first_name }}  {{ $student->last_name }}</h6>
                                    
                          
                                
                                </div>
                                @php 
                                $nbrOfReadStoriesByStudent =  $nmberOfReadStoriesByStudent->where('student_id',$student->id)->first()??false;
                                $averageReadStoriesByClass =  $avgReadStoriesByClass->where('class_id',$student->classe_id)->first()??false;
                                $avgStudentScore =  $avgStudentScoreByClassesAndExerciseType->where('student_id',$student->id)->first()??false;
                                $avgAcademicLevelScore =  $avgAcademicLevelScoreByAcademicLevelsAndExerciseType->where('academic_level_id',$student->classe->academic_level_id)->first()??false;
                               
                              @endphp
                              {{$student->class_id}}
                                <a href="#" class="btn add-btn" data-toggle="modal" onclick="updateStats({{($nbrOfReadStoriesByStudent)?$nbrOfReadStoriesByStudent->nbReadStories:0}},{{($averageReadStoriesByClass)?$averageReadStoriesByClass->avgNbReadStories:0}},{{($avgStudentScore)?$avgStudentScore->avgScore:0}},{{($avgAcademicLevelScore)?$avgAcademicLevelScore->avgScoreByAcademicLevel:0}})" data-target="#add_training">
                                <object data="{{ asset($student->avatar) }}"  class="img-fluid member-image" type="image/png">
                                  <img src="{{asset('file_storage/'.$student->avatar) }}" alt="{{ $student->first_name }}"   class="img-fluid member-image">
                                </object>
                                </a>
                          </div>
                        
                        <div class="classes-items-content">
                         
                    <div class="row" style="justify-content:space-evenly;"  >
                            
                        <p style="font-size: 20px; ">
                            {{__('messages.Number of read stories')}}
                                 </p>
                            
                        
                                <div class="carre">
                                  <h6>  {{$student->storyReads()->count()}}</h6>
                                 </div>
                  
                          </div>
                          @php 

                          $avgScoreType1 = (isset($avg[1]))?$avg[1]->unique('story_id')->where('student_id',$student->id)->avg('avgTypeScore'):'';
                          $avgScoreType1 = ($avgScoreType1)?number_format($avgScoreType1):-1;
                          $avgScoreType2 = (isset($avg[2]))?$avg[2]->unique('story_id')->where('student_id',$student->id)->avg('avgTypeScore'):'';
                          $avgScoreType2 = ($avgScoreType2)?number_format($avgScoreType2):-1;
                          $avgScoreType3 =(isset($avg[3]))?$avg[3]->unique('story_id')->where('student_id',$student->id)->avg('avgTypeScore'):'';
                          $avgScoreType3 = ($avgScoreType3)?number_format($avgScoreType3):-1;
                           
                          @endphp
                          
                          
                                                    <!-----------------------------------chart---------------------------------------------------------->
                          <a href="{{ url('student_detail/'.$student->id) }}">
                              <div style="display:flex;justify-content: space-between;margin-top:10px">
                                   <div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType3}}; --primary:#FBCB0A;"></div> 
                              <div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType2}}; --primary:#27B1BE;"></div> 
                              <div role="progressbar" aria-valuemin="0" aria-valuemax="100" style=" --value: {{$avgScoreType1}};--primary:#FF4949;" ></div>
                            </div>
                          </a>

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


   
        <!-- Add Training List Modal -->
        <div id="add_training" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title" >  </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                           <!-- content -->
                          
                          
                            <div class="chartBox">
                              <h6> مقارنة نتائج التلميذ مع معدل أقرانه من نفس المستوى</h6>
                              <canvas id="myChart"></canvas>
                            </div>
                          
                      <!----------------------------------------------------->
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Training List Modal -->

</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

      let classData = [14,12];
      let studentData = [9,9];
      function updateStats(nbReadStories,avgNbReadStories,avgStudentScore,avgAcademicLevelScore){
        
        classData = [avgAcademicLevelScore,avgNbReadStories];
        studentData = [avgStudentScore,nbReadStories];
        myChart.data.datasets[0].data = classData;
        myChart.data.datasets[1].data = studentData;
        myChart.update();
      }
   // setup 
   let data = {
      labels: ['على مستوى تمارين الفهم', 'على مستوى عدد القصص المقروءة'],
      datasets: [{
        label: 'معدل أقرانه',
        data: classData,
        backgroundColor: '#083AA9',
        borderColor:'#083AA9',
        borderWidth: 1,
        yAxisID:'currency'
      },
      {
        label: 'نتائج التلميذ',
        data: studentData,
        backgroundColor:'#C70A80',
        
        borderColor: '#C70A80',
        borderWidth: 1,
        yAxisID:'percentage'
      }]
    };

    // config 
    let config = {
      type: 'bar',
      data,
      options: {
        scales: {
           currency:{
            type: 'linear',
            position: 'left',
            min:0,
            max:100,
            title:{
              display: true,
              text:'النسبة',
            },
           },
           percentage:{
            type: 'linear',
            position: 'right',
            min:0,
            max:100,
            grid:{
              display:false,
            },
            title:{
              display: true,
              text:'العدد'
            },
           },
        
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );  
</script>

@endsection