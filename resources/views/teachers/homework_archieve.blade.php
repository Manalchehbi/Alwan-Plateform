@extends('layouts.master-lay')

@section('page-name')
     
   @php
      $page="Archive-page";   
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
    transform: scale(1.03);
      -webkit-transform: scale(1.03);
      -moz-transform: scale(1.03);
      -ms-transform: scale(1.03);
      -o-transform: scale(1.03);
     } 
.descript{

  text-align: center;


}
  </style>
  
<link rel="stylesheet" href="{{asset('fm.selector.jquery.css')}}">;
  
  <ul class="list-group">
      @foreach( $homeworks as $homework )
    <a href="{{ url('archieve-detail/'.$homework->id) }}">
   <li class="list-group-item list-group-item-light"> {{$homework->classe->name}}  <img src="{{ asset('file_storage/'. $homework->story->picture) }}"  class="img-fluid" alt="Dental Care" width="200px"><br> <span class="descript" style="margin-right:2%">{{$homework->created_at->format('d/m/Y')}} </span> </li>
    </a>
      @endforeach
  
  </ul>
     
  
  
  
     
  
  
    <script src="{{asset('jquery/jquery.min.js" type="text/javascript')}}"></script>
    <script src="{{asset('popper/popper.min.js" type="text/javascript')}}"></script>
    

@endsection