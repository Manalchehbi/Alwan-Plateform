@extends('layouts.master-lay')

@section('page-name')
     
   @php
     $page="School-Page";    
   @endphp
    
   @endsection
    

@section('content')

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
    margin-left: 10%;
    
}
.boxsent{
  width: 40%;
    color: black;
    background-color: #00FFD1;
    padding: 10px;
    text-align: center;
    border-radius: 15px;
    margin-left: 30%;
    margin-bottom:10px;
    

}
.card{
  width: 700px;
  height: 430px;
}
#piechart{
  

}

</style>

<div class="container">
  <div class="row">
<!----------------------------------chart------------------------------------------->
    <div class="col-sm-12 col-md-6  text-center" style="padding-bottom: 20px;margin-top: 20px">
      <div class="card">
        <div class="card-body">
            <h6>{{__('messages.The number of students involved')}}</h6>
           
                
                    <div id="piechart" style="width: 680px; height: 260px;" ></div>
              
          
        </div>
      </div>
    </div>
<!---------------------------------end------------------------------------------------->
    
<!--------------------------------school user---------------------------------------------->
<div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" style="padding-bottom: 20px; margin-top:20px;margin-left:13%">
  <div class="events-items dental-care text-center  box-shadow">
    <div class="events-items-img">
      
      <img src="{{ asset('images/schools/'.$school->logo) }}" class="img-fluid" alt="Dental Care">
      
    </div>

   

    <div class="events-items-content">
      
         <h6>{{ $school->name }}</h6>


    </div>
  

  </div>
</div>
<!--------------------------------------------------------------------------------->
  </div>
</div>

<!---------------------------------list of teachers------------------------------->
                <!-- Classes Section -->
          <section style="background-color: transparent" class="section-wrapper">
            <div class="container"> 
                 <!--//////////////////////////  STUDENT * 2 for demo purposes /////////////////////////////////-->
                  <div class="row ">
                     
                      @foreach($school->teacher as $teach)
                      
                              <div class="col-sm-4 col-sm-12 col-md-6 col-lg-3 py-3 wow fadeInUp animated" data-wow-delay="200ms">
                                  <div class="classes-items classes-items-index2 standard-learning text-center">
                                     
                                          <div class="classes-items-img">
                                          
                                              <a href="{{url('teacherDetails/'.$teach->id)}}">
                                                <object data="{{ asset($teach->picture) }}"  class="img-fluid member-image" type="image/png">
                                                  <img src="{{asset('file_storage/'.$teach->picture) }}" alt="{{ $teach->first_name }}"  class="img-fluid member-image">
                                                </object>
                                              </a>
                                          </div>
                                    
                                      <div class="classes-items-content">
                                        <h6>{{$teach->first_name}}</h6>
                                        <h6>{{$teach->last_name}}</h6>
                                        <!--------------------------------------------------->
                                        <div class="row text-center">
                            
                                          <p style="font-size: 20px; margin-left:10%; ">
                                            {{__('messages.Number Of Homework Sent')}}
                                           </p>
                                      
                                                <div class="col">
                                                    <div class="carre">
                                                   {{$teach->Homeworks()->count()}}
                                                    </div>
                                                </div>
                                         </div>
                                        <!------------------------------------------------------------->
                               </div>        
              <!-----------------------------------chart---------------------------------------------------------->
              
            
              
              <!-----------------------------------------endchart--------------------------------------->
                                      
               </div>
            </div>
          
                              @endforeach 
                              
            </div>
              
              
                      
                 <!--//////////////////////////////////////////////////////////-->
         </div>
          </section>



<!---------------------------------endlist---------------------------------------->




<!---------------------------------script for chart------------------------------->


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['academic_level', 'number of students'],
          ['حضانة أولى',6],
          ['حضانة ثانية',6],
          ['المستوى الأول',6],
          ['المستوى الثاني',4],
          ['المستوى الثالت',4],
          ['المستوى الرابع',4],
          ['المستوى الخامس',2],
          ['المستوى السادس',5]
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
  </script>



<!--------------------------endsricpt----------------------------------------------->

@endsection