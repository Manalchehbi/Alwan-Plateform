@extends('layouts.master-lay')

@section('page-name')
     
   @php
     $page="StatisticsLevel-Page";    
   @endphp
    
   @endsection
    

@section('content')

   <div class="row text center" >
    <!---------------------------------Exercises------------------------------------------------->
       <div class="col-sm-12 col-md-6 col-lg-5" style="padding-bottom: 20px;margin-top: 20px;margin-left:8%;">
        <h2 style="text-align: center;">{{__('messages.Number Of Exercises completed By Level academy')}} </h2>
        <canvas id="myChart" width="auto" height="auto" style="background-color: white;"></canvas>
       
       </div>
 <!--------------------------------end---------------------------------------------->
      <!---------------------------------stories------------------------------------------------->
      <div class="col-sm-12 col-md-6 col-lg-5" style="padding-bottom: 20px;  margin-top: 20px;">
        <h2 style="text-align: center;">{{__('messages.Number Of Reading Story By Level academy')}}</h2>
        <canvas id="Chart2" width="auto" height="auto" style="background-color: white;"></canvas>
       
      </div>
<!--------------------------------end---------------------------------------------->
   </div>
   <div class="row">
        <!---------------------------------worksheet------------------------------------------------->
            <div class="col-sm-12 col-md-6 col-lg-5" style="padding-bottom: 20px;margin-left:8%;">
              <h2 style="text-align: center;">{{__('messages.Number Of loads of worksheets By Level academy')}}  </h2>
              <canvas id="Chart3" width="auto" height="auto" style="background-color: white;"></canvas>
       
            </div>
        <!--------------------------------end---------------------------------------------->
        <!---------------------------------homework------------------------------------------------->
            <div class="col-sm-12 col-md-6 col-lg-5 " style="padding-bottom: 20px">
              <h2 style="text-align: center;">{{__('messages.Number Of Homeworks Sent By Level academy')}}</h2>
              <canvas id="Chart4" width="auto" height="auto" style="background-color: white;"></canvas>
            </div>
      <!--------------------------------end---------------------------------------------->
   </div>

   <script src="https://cdnjs.com/libraries/Chart.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
   
        data: {
          
            labels:[
               'حضانةأولى',
               'حضانة ثانية',
              'المستوى الأول',
              'المستوى الثاني',
              'المستوى الثالت',
              'المستوى الرابع',
              'المستوى الخامس',
              'المستوى السادس'
            ],
            datasets: [{
                label: 'العدد',
                data: [120,60,70,50, 70, 30, 20, 40],
                backgroundColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                   title: 'Coloring Letters',
                    max: 200,
                    min: 0,
                    ticks: {
                        stepSize: 50
                    }
                }
               
            },
            plugins: {
                title: 
                {
                    display: false,
                    text: 'Custom Chart Title',
                },
                legend: {
                    display: false,
                }
            }
        }
    });
</script>
 
<script>
    var ctx = document.getElementById('Chart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
   
        data: {
          
            labels:[
               'حضانةأولى',
               'حضانة ثانية',
              'المستوى الأول',
              'المستوى الثاني',
              'المستوى الثالت',
              'المستوى الرابع',
              'المستوى الخامس',
              'المستوى السادس'
            ],
            datasets: [{
                label: 'العدد',
                data: [120,60,70,50, 70, 30, 20, 40],
                backgroundColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                   title: 'Coloring Letters',
                    max: 200,
                    min: 0,
                    ticks: {
                        stepSize: 50
                    }
                }
               
            },
            plugins: {
                title: 
                {
                    display: false,
                    text: 'Custom Chart Title',
                },
                legend: {
                    display: false,
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('Chart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
   
        data: {
          
            labels:[
               'حضانةأولى',
               'حضانة ثانية',
              'المستوى الأول',
              'المستوى الثاني',
              'المستوى الثالت',
              'المستوى الرابع',
              'المستوى الخامس',
              'المستوى السادس'
            ],
            datasets: [{
                label: 'العدد',
                data: [120,60,70,50, 70, 30, 20, 40],
                backgroundColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                   title: 'Coloring Letters',
                    max: 200,
                    min: 0,
                    ticks: {
                        stepSize: 50
                    }
                }
               
            },
            plugins: {
                title: 
                {
                    display: false,
                    text: 'Custom Chart Title',
                },
                legend: {
                    display: false,
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('Chart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
   
        data: {
          
            labels:[
               'حضانةأولى',
               'حضانة ثانية',
              'المستوى الأول',
              'المستوى الثاني',
              'المستوى الثالت',
              'المستوى الرابع',
              'المستوى الخامس',
              'المستوى السادس'
            ],
            datasets: [{
                label: 'العدد',
                data: [120,60,70,50, 70, 30, 20, 40],
                backgroundColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                   title: 'Coloring Letters',
                    max: 200,
                    min: 0,
                    ticks: {
                        stepSize: 50
                    }
                }
               
            },
            plugins: {
                title: 
                {
                    display: false,
                    text: 'Custom Chart Title',
                },
                legend: {
                    display: false,
                }
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('Chart4').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
   
        data: {
          
            labels:[
               'حضانةأولى',
               'حضانة ثانية',
              'المستوى الأول',
              'المستوى الثاني',
              'المستوى الثالت',
              'المستوى الرابع',
              'المستوى الخامس',
              'المستوى السادس'
            ],
            datasets: [{
                label: 'العدد',
                data: [120,60,70,50, 70, 30, 20, 40],
                backgroundColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderColor: [
                    '#3366cc',
                    '#dc3912',
                    '#ff9900',
                    '#109618',
                    '#990099',
                    '#0099c6',
                    '#dd4477',
                    '#66aa00'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                   title: 'Coloring Letters',
                    max: 200,
                    min: 0,
                    ticks: {
                        stepSize: 50
                    }
                }
               
            },
            plugins: {
                title: 
                {
                    display: false,
                    text: 'Custom Chart Title',
                },
                legend: {
                    display: false,
                }
            }
        }
    });
</script>
@endsection