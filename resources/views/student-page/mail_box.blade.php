@extends('layouts.master-lay')

@section('page-name')
     
   @php
     $page="Box-Page";    
   @endphp
    
   @endsection
    

@section('content')
<style>
ul.list-group {
  display: flex;
}

li.list-group-item{
  text-align: right;
  font-size: 30px;
  
}
li.list-group-item img{
  text-align: right;
  margin-left: 20px;
}
li.list-group-item:hover {  
  box-shadow: 0px 4px 14px 3px #882ff638;
  transform: scale(1.02);
    -webkit-transform: scale(1.02);
    -moz-transform: scale(1.02);
    -ms-transform: scale(1.02);
    -o-transform: scale(1.02);
   } 
</style>

@if(Auth::user()->isStudent()&& Auth::user()->is_freetrial==true)
<div>
</div>

@else
<link rel="stylesheet" href="fm.selector.jquery.css">;

  <ul class="list-group">
   @foreach( $homeworks as $homework )
   <a href="{{ url('choice/'.$homework->story->id) }}">
  <li class="list-group-item list-group-item-light"> {{$homework->created_at->format('d/m/Y')}}  <img src="{{ asset('file_storage/'. $homework->story->picture) }}" class="img-fluid" class="img-fluid" alt="Dental Care" width="300px"> </a></li>
   </a>
   @endforeach

  </ul>
   



   


  <script src="jquery/jquery.min.js" type="text/javascript"></script>
  <script src="popper/popper.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

  @endif
@endsection