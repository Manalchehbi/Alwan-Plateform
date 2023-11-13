@extends('layouts.master-lay')

@section('page-name')
     
   @php
     $page="Espace-Page";    
   @endphp
    
   @endsection
    

@section('content')
<div class="container text-center mt-5">
    <a href="{{url('index')}}"><img src="{{asset('img/logo/logo.png')}}" alt="" width="350px"></a>
    <!------------------------------------------->
     <div class="row mt-5">
        <!------------------------------------------->
     <div class="col-sm-12 col-md-4 col-lg-4 py-3">
        <a  href="{{ route('studentlogin') }}">
         <div class="card shadow">
            <img src="/images/student.png" class="card-img-top" alt="student">
            <div class="card-body">
                <h4 class="card-title">{{__('messages.Student') }}</h4>
            </div>
         </div>
        </a>
    </div>
       <!----------------------------------->
        <!------------------------------------------->
         <div class="col-sm-12 col-md-4 col-lg-4 py-3">
            <a  href="{{ route('schoollogin') }}">
            <div class="card shadow">
                <img src="/images/school.jpg" class="card-img-top" alt="school">
                <div class="card-body">
                    <h4 class="card-title">{{__('messages.School') }}</h4>
                </div>
            </div>
            </a>
         </div>
<!----------------------------------->
<!------------------------------------------->
        <div class="col-sm-12 col-md-4 col-lg-4 py-3">
            <a  href="{{ route('teacherlogin') }}">
            <div class="card shadow">
                <img src="/images/teacher.jpg" class="card-img-top" alt="teacher">
                <div class="card-body" >
                    <h4 class="card-title">{{__('messages.Teacher') }}</h4>
                </div>
            </div>
        </a>
        </div>
<!----------------------------------->

       </div>
<!----------------------------------->
</div>
<!--About BG Image-->
<div id="about-bg-img">
    <div class="about-bg-img1">
        <img src="{{asset('img/about/about_us_element1.png')}}" class="img-fluid" alt="Element 1">
    </div>
    <div class="about-bg-img2">
        <img src="{{asset('img/about/about_us_element2.png')}}" class="img-fluid" alt="Element 2">
    </div>
    <div class="about-bg-img3">
        <img src="{{asset('img/about/about_us_element3.png')}}" class="img-fluid" alt="Element 3">
    </div>
    <div class="about-bg-img4">
        <img src="{{asset('img/about/about_us_element4.png')}}" class="img-fluid" alt="Element 4">
    </div>
    <div class="about-bg-img5">
        <img src="{{asset('img/about/about_us_element5.png')}}" class="img-fluid" alt="Element 5">
    </div>
</div>
<!--About BG Image Ends-->

@endsection