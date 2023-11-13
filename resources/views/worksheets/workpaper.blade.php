@extends('layouts.master-lay')

   @section('page-name')

     

   @php

     $page="Workpaper-Page";    

   @endphp

    

   @endsection



   @section('css')

<style>

ol {counter-reset: repas;} /* on initialise et nomme un compteur */

.lii {

	list-style-type: none;

	counter-increment: repas; /* on incrémente le compteur à chaque nouveau li */

	margin-bottom: 10px;

  color: #27b2d5;

  font-size:20px;

}

.lii:before {

	content: counter(repas); /* on affiche le compteur */

	padding: 0 20px 6px;

	margin-right: 8px;

	margin-left: 10px;

	vertical-align: top;

	background:#ff3683;

	-moz-border-radius: 50%;

	border-radius: 50%;

	font-weight: bold;

	font-size: 0.8em;

	color: white;		

}

ol {counter-reset: repas;} /* on initialise et nomme un compteur */

.lii1 {

	list-style-type: none;

	counter-increment: repas; /* on incrémente le compteur à chaque nouveau li */

	margin-bottom: 10px;

  color: #27b2d5;

  font-size:40px;

}

.lii1:before {

	content: counter(repas); /* on affiche le compteur */

	padding: 0 20px 6px;

	margin-right: 8px;

	vertical-align: top;

	background:#ff3683;

	-moz-border-radius: 50%;

	border-radius: 50%;

	font-weight: bold;

	font-size: 0.8em;

	color: white;		

}

.boxscore{

    width  : 300px;

    height : 40px;

    display: flex;

    color:  white;

    background-color: #6930C3;

    padding: 30px;

    align-items: center;

    justify-items: center;

    font-size: 40px;

    text-align: center;

    margin-left: 40%;

    border-radius: 5px;

    margin-top: 10%;

    margin-bottom: 10%;



}

div.scrollmenu {
  margin-right:150px;
  background-color: rgb(189, 187, 187);
  overflow: auto;
  white-space: nowrap;
}

</style>



@endsection



@section('content')



<div class="container" style="max-width: 100%;">

<div class="row">   

    

   <br>

    



<div class="container">

<div class="row" style="padding: 30px;">

<div class="col-sm-12 col-md-12 col-lg-12" id="collection" style="text-align:center;">

   <div class="horizontal-heading">

    <h6>أوراق عمل لتعلم اللغة العربية </h6>

   </div>

</div>



  @foreach ($workSheetCategories as $workSheetCategory)

      

  <div  dir='rtl' lang="ar" class="col-sm-12 col-md-6 col-lg-4 py3" style="padding: 30px;justify-content:space-evenly;text-align:right">



    <a href="#pdf_file_{{$workSheetCategory->id}}" style="font-size: 30px; text-align:right; " >{{$workSheetCategory->name}}</a>

    <ol >

      @foreach ($workSheetCategory->children as $item)

          

    <li class="lii" ><a href="#pdf_file_{{$item->id}}"  >{{$item->name}}</a>

    </li>

      @endforeach

    </ol>

  </div>

  @endforeach

</div>



</div>

  <br>

  <br>

  <div dir="rtl" lang="ar" style="overflow-x: hidden;">

    
  @foreach ($workSheetCategories as $workSheetCategory)

      
  <div style="padding-right: 30px;padding-left: 30px; margin-right:50px;margin-left:50px" id="pdf_file_{{$workSheetCategory->id}}">
    

    

      @foreach ($workSheetCategory->children as $item)

      <a class='lii' id="pdf_file_{{$item->id}}" style="font-size:60px;float:right;color:#27b2d5 " >{{$item->name}}</a>

      <div  class="row" style="width: 90%;text-align:center;">

        

       
  
   
   
    <!----------------------------------------------------->
    @foreach ($item->workSheets as $worksheet)
       
      
   
        @foreach ($worksheet->thumbnails as $thumbnail)
        
        <div  class="col-sm-12 col-md-4 col-lg-2" style="margin-top:10px;width:130px;">

          
          
          <a href="{{route('filesystem',$worksheet->path)}}" style=" font-size: 20px;margin-right:70px;">  <img  src="{{route('filesystem',$thumbnail->path)}}" width="120px" height="auto" />
          
          </a>

  

            

        </div>
      
        @endforeach  
    
  

  @endforeach

    <!------------------------------------------------------------>
    
 


 <!------------------------------------------------------------------->

 <div class="col-sm-12 col-md-12 col-lg-12 text-center" style="text-align:center;">

  <a href="#collection"> 

    <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"

       style="background-color:#6930C3;border-color:#6930C3; width:20%;font-size:20px;margin-bottom:5%;margin-top:10px; ">

        {{__('messages.Back to the index')}}

      </button>



  </a>

</div>

<!--------------------------------------------------------------------->

      </div>

      @endforeach

    
     </div>
  @endforeach
  

  </div>



</div>



</div>



@endsection