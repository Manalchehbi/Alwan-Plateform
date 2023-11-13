@extends('layouts.master-lay')

   @section('page-name')


   @php

     $page="Useful-Page";    

   @endphp

    

   @endsection

   @section('content')
   
   
@if(Auth::user()->isStudent()&& Auth::user()->is_freetrial==true)
<div>
</div>

@else
        <div class="container">
        
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
       
                        <div class="horizontal-heading">
                            <h3 class="hd1"> {{__('messages.Useful Ressources')}}</h3>
                        </div>  
               
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
          
            <!-- upper part Ends -->
<div class="container ">
  <div class="row" style="justify-content:space-evenly">
    
    @foreach ($useful as $lien)
    <div class="col-sm-4 col-sm-12 col-md-6 col-lg-4 py-3   ">

   
    
      <div class="card"  data-groups="[&quot;nature&quot;]" style="width:300px;">
      
         <h2>{{$lien->name}}<h2>
      
      <figure class="pp-effect"><iframe class="img-fluid"  src="{{$lien->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      </figure>
    
      
    
    </div>

         
    
     
    </div>
    @endforeach
  </div>
</div>
<div class="pp-section">
      <div>
           {{$useful->links()}}
      </div>
    </div>
   
    <script src="scripts/jquery.min.js?ver=1.2.0"></script>
    <script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="scripts/main.js?ver=1.2.0"></script>
          

             
            </div>
            <!-- Lower Part Ends -->
        </div>
  
  @endif    
@endsection