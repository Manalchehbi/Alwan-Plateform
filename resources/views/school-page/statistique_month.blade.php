@extends('layouts.master-lay')

@section('page-name')
     
   @php
     $page="StatisticsMonth-Page";    
   @endphp
    
   @endsection
    

@section('content')


    <div class="row">
     <!---------------------------------Exercises------------------------------------------------->
        <div class="col-sm-12 col-md-6 col-lg-5" style="padding-bottom: 20px; margin-top:15px;margin-left:8%;">
             <div id="Mychart" style="width: auto"></div>
        </div>
  <!--------------------------------end---------------------------------------------->
       <!---------------------------------stories------------------------------------------------->
       <div class="col-sm-12 col-md-6 col-lg-5" style="padding-bottom: 20px;margin-top:15px">
         <div id="chart1" style="width: auto"></div>
       </div>
 <!--------------------------------end---------------------------------------------->
    </div>
    <div class="row">
         <!---------------------------------worksheet------------------------------------------------->
             <div class="col-sm-12 col-md-6 col-lg-5" style="padding-bottom: 20px;margin-left:8%;">
               <div id="chart2" style="width: auto"></div>
             </div>
         <!--------------------------------end---------------------------------------------->
         <!---------------------------------homework------------------------------------------------->
             <div class="col-sm-12 col-md-6 col-lg-5" style="padding-bottom: 20px">
               <div id="chart3" style="width: auto"></div>
             </div>
       <!--------------------------------end---------------------------------------------->
    </div>

 <script src="https://code.highcharts.com/highcharts.js"></script>

 <script type="text/javascript">
     var userData = [10,20,30,40,50,60,80,90,100,110,120 ];
     Highcharts.chart('Mychart', {
         title: {
             text: 'عدد التمارين المنجزة حسب الشهور'
         },
        
         xAxis: {
            categories: [
            'شتنبر',
             'أكتوبر',
             'نونبر',
              'دجنبر',
             'يناير',
            'فبراير', 
            'مارس', 
            'أبريل',
             'ماي', 
             'يونيو',
             'يوليوز'
             ]
           
         },
         yAxis: {
             title: {
                 text: ''
             }
             
         },
         legend: {
             layout: 'vertical',
             align: 'right',
             verticalAlign: 'middle',
        
         },
         plotOptions: {
             series: {
                 allowPointSelect: true
             }
         },
         series: [{
             name: 'عدد التمارين المنجزة',
             data: userData
         }],
         responsive: {
             rules: [{
                 condition: {
                     maxWidth: 500
                 },
                 chartOptions: {
                     legend: {
                         layout: 'horizontal',
                         align: 'center',
                         verticalAlign: 'bottom',
                        

                     }
                 }
             }]
         }
     });
 </script>
 <script type="text/javascript">
   var userData = [10,20,30,40,50,60,80,90,100,110,120 ];
   Highcharts.chart('chart1', {
       title: {
           text: 'عدد القصص المقروءة حسب الشهور'
       },
       
       xAxis: {
        categories: [
            'شتنبر',
             'أكتوبر',
             'نونبر',
              'دجنبر',
             'يناير',
            'فبراير', 
            'مارس', 
            'أبريل',
             'ماي', 
             'يونيو',
             'يوليوز'
             ]
       },
       yAxis: {
           title: {
               text: ''
           }
       },
       legend: {
           layout: 'vertical',
           align: 'right',
           verticalAlign: 'middle'
       },
       plotOptions: {
           series: {
               allowPointSelect: true
           }
       },
       series: [{
           name: 'عدد القصص المقروءة',
           data: userData
       }],
       responsive: {
           rules: [{
               condition: {
                   maxWidth: 500
               },
               chartOptions: {
                   legend: {
                       layout: 'horizontal',
                       align: 'center',
                       verticalAlign: 'bottom'
                   }
               }
           }]
       }
   });
</script>
<script type="text/javascript">
   var userData = [10,20,30,40,50,60,80,90,100,110,120];
   Highcharts.chart('chart2', {
       title: {
           text: 'عدد تحميلات أوراق العمل حسب الشهور'
       },
      
       xAxis: {
        categories: [
            'شتنبر',
             'أكتوبر',
             'نونبر',
              'دجنبر',
             'يناير',
            'فبراير', 
            'مارس', 
            'أبريل',
             'ماي', 
             'يونيو',
             'يوليوز'
             ]
       },
       yAxis: {
           title: {
               text: ''
           }
       },
       legend: {
           layout: 'vertical',
           align: 'right',
           verticalAlign: 'middle'
       },
       plotOptions: {
           series: {
               allowPointSelect: true
           }
       },
       series: [{
           name: 'عدد تحميلات أوراق العمل',
           data: userData
       }],
       responsive: {
           rules: [{
               condition: {
                   maxWidth: 500
               },
               chartOptions: {
                   legend: {
                       layout: 'horizontal',
                       align: 'center',
                       verticalAlign: 'bottom'
                   }
               }
           }]
       }
   });
</script>
<script type="text/javascript">
   var userData = [10,20,30,40,50,60,80,90,100,110,120 ];
   Highcharts.chart('chart3', {
       title: {
           text: 'عدد الواجبات المرسلة حسب الشهور'
       },
      
       xAxis: {
        categories: [
            'شتنبر',
             'أكتوبر',
             'نونبر',
              'دجنبر',
             'يناير',
            'فبراير', 
            'مارس', 
            'أبريل',
             'ماي', 
             'يونيو',
             'يوليوز'
             ]
       },
       yAxis: {
           title: {
               text: ''
           }
       },
       legend: {
           layout: 'vertical',
           align: 'right',
           verticalAlign: 'middle'
       },
       plotOptions: {
           series: {
               allowPointSelect: true
           }
       },
       series: [{
           name: 'عدد الواجبات المرسلة',
           data: userData
       }],
       responsive: {
           rules: [{
               condition: {
                   maxWidth: 500
               },
               chartOptions: {
                   legend: {
                       layout: 'horizontal',
                       align: 'center',
                       verticalAlign: 'bottom'
                   }
               }
           }]
       }
   });
</script>

@endsection