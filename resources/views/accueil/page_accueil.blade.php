@extends('layouts.master-lay')
@section('page-name')

@php
$page="Landing-Page";
@endphp

@endsection
@section('title')

{{__('messages.Alwan')}}

@endsection

@section('css')
@if(App::getLocale()=="ar")
<style>

    html,
    body {
        height: 100%;
        font-family: 'yaseerregular', sans-serif !important;
    }
    div,
    p,li {
        
        font-family: 'yaseerregular', sans-serif !important;
    }
    
    
    h1,
    h2,
    h3,
    h4 {
        font-family: "yaseerregular", sans-serif !important;
        margin-bottom: 0;
    }
    
    h5,
    h6 {
        font-family: "AraHamahZanki", sans-serif !important;
        margin-bottom: 0;
    }
    .horizontal-heading h2{
         font-family: "yaseerregular", sans-serif !important;
        margin-bottom: 0;
    }
    
    nav ul li{
        font-family: "AraHamahZanki", sans-serif !important;
        margin-bottom: 0;
    }
    
    nav ul li:hover{

    transform: scale(1.50);
    -webkit-transform: scale(1.20);
    -moz-transform: scale(1.20);
    -ms-transform: scale(1.20);
    -o-transform: scale(1.20); 


}
.btn {
    font-family: "AraHamahZanki", sans-serif!important;
    border-radius: 28px;
    
}
.btn:hover {
    
    
    cursor: pointer;
    transform: scale(1.03);
    -webkit-transform: scale(1.03);
    -moz-transform: scale(1.03);
    -ms-transform: scale(1.03);
    -o-transform: scale(1.03);
}
    
    </style>

@endif
<style>

    .btna:link,
    .btna:visited {
        background-color: #f44336;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        width: 170px;
    }

    .btna {
        border-radius: 30px;
    }

    .btna:hover,
    .btna:active {
        background-color: red;

    }
</style>

@endsection

@section('content')
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- Preloader Ends -->

<!--Header Area-->

<!--Header Area Ends-->

<!--Banner Area-->
<section id="banner">


    <div class="banner-element-arae">



        <img src="{{asset('img/banner/banner-element.png')}}" alt="img">
        <!--Banner Button-->



    </div>


    <div class="container">


        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <!--Banner Content-->

                <div id="banner-content">
                <div class="col-md-12 text-center">
                            <h1 style="color:bisque;">
                                {{__('messages.It is the ideal platform to support the educational process')}}
                            </h1>
                            <br><br>
                        </div>
                      
                       
                    </div>
                    <!--Banner Content-->
                </div>
            </div>
            
     <!--Banner Button-->
            <div id="banner-btn" style="position: absolute;
            left: 15%;
            top: 85%;">
            <a class="btna" title="Sign In" href="{{ url('espace/')}}" role="button" style="font-family: AraHamahZanki, sans-serif !important; ">{{__('messages.Sign In')}}</a>
        </div>
        </div>
    </section>
    <!--Banner Area Ends-->
    <!--About Us Section-->
    <section id="about" class="section-wrapper">
        
        <div class="container">

            <!--Upper Part-->
            <div class="row">
                <div class="col-sm-12 col-sm-12 col-md-12 col-lg-12 text-center" >
                    <div class="horizontal-heading" id="collection" >
                        <h6>{{__('messages.ABOUT US')}}</h6>
                        
                    </div>
                    <div class="horizontal-heading">
                        <h2>{{__('messages.The platform Alwan supports the educational process using various and innovative tools to consolidate the basics of Arabic language in a fun template that makes a way to enhance language skills without notice of the child and allows the teacher to use the content of the interactive platform and follow up the activity Assessment of their performance')}}</h2>
                    </div>
                </div>
            </div>
            <!--Upper Part Ends-->

            <!--Lower Part-->
            <div class="row" dir="{{(App::getLocale()=='ar')?'rtl':'ltr'}}" lang="{{App::getLocale()}}" >
                 <!-- Lower Left Side -->
                 <div class="col-sm-12 col-sm-12 col-md-7 col-lg-7">
                    <div id="about-left">

                        <div id="about-left-img" class="wow fadeInLeft animated">
                            <img src="{{asset('img/about/about_us.jpeg')}}" class="img-fluid" alt="About Us image">
                    </div>

                    <div id="about-left-img2" class="wow fadeInRight animated">
                        <img src="{{asset('img/about/2.png')}}" class="img-fluid" alt="about-img">
                        <div class="video-icon">
                            <a href="https://www.youtube.com/embed/Kb8CW3axqRE" class="banner-video video-link"
                                data-width="1200" data-height="1080"><img src="{{asset('img/banner/play-button.svg')}}"
                                    alt="icon"></a>
                        </div>
                        <div class="img-overlay"></div>
                    </div>

                </div>
            </div>
            <!-- Lower Left Side Ends -->
            
            
            
            <!--Lower Right Side-->
                <div class="col-sm-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="about-para">
                    </div>
                    <!--About List-->
                    <div class="about-list">
                        <ul>
                            <li> <i class="fa fa-check-circle " ></i> {{__('messages.Identify reading an early ageum by sound')}} </li>
                            <li> <i class="fa fa-check-circle " ></i> {{__('messages.Learn to learn to read using innovative means')}}<br></li>
                            <li> <i class="fa fa-check-circle " ></i> {{__('messages.Enrich vocabulary and enrich the dictionary and master language')}}</li>
                            <li> <i class="fa fa-check-circle " ></i> {{__('messages.Develop imagination and analysis skills')}}</li>
                            <li> <i class="fa fa-check-circle " ></i> {{__('messages.Distinctive optical tougher given the diversity of fee sources')}}</li>
                            <li> <i class="fa fa-check-circle " ></i> {{__('messages.Stimulating appreciation')}}</li>
                        </ul>
                    </div>

                    <div id="about-btn">
                        <a class="btn btn-general btn-about smooth-scroll" href="about.html" title="Discover More"
                            role="button" style="font-family: AraHamahZanki, sans-serif !important; ">{{__('messages.Free Trial')}}</a>
                    </div>
                </div>
                <!--Lower Right Side Ends-->
               



        </div>

        <!--Lower Part Ends-->
    </div>
    <!--About BG Image-->
    <div id="about-bg-img')}}">
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


</section>
<!--About Us Section Ends-->


<!--Offer Section Ends-->
<section id="about" class="section-wrapper">

    <div class="container">
      <!--------------------------goals------------------------------->
      <div class="row">
        <div dir="rtl" lang="ar" class="card">
            <div dir="rtl" lang="ar" class="card-body">
            <div dir="rtl" lang="ar" class="row">
                <div class="col-sm-12 col-md-6 ">
                    <img src="{{asset('img/classes/calss-img1.jpg')}}" class="img-fluid rounded-start" style="height: 555px;">
                </div>
                <div class="col-sm-12 col-md-6  text-center" style="padding-bottom: 20px;margin-top: 20px">
                    <div class="horizontal-heading">
                        <h6>{{__('messages.PLATFORM GOALS')}}</h6>
                    </div>
                    <div dir="rtl" lang="ar" style="text-align: justify;">
                      <p style=" font-size:19px;">{{__('messages.The ALWAN platform aims to define your children with reading pleasures and invites them to discover the amazing fantasy worlds , it presented by a rich and varied catalog with global cultural backgrounds carefully selected to in line with our customs and Arab culture. However, the content of the podium will execute new publications per month.')}} <br><br></p>
                  
                       <p style="font-size:19px;"> {{__('messages.We are accompanied by your children from an early age to learning to read, analysts are feasible in an integrated template to define pre-school reading children and their account for the primary stage.')}} <br><br></p>
    
                       <p style="font-size:19px;"> {{__('messages.We are encouraged to read quiet and hypocrisy and those who have been keen to underestimate each of which would confess to the focus of the student while addressing it in the language of his time and gives him the opportunity to play and challenge through interactive exercises that support the educational process and Respect intellectual growth of the child.')}} <br><br></p>
    
                       <p style="font-size:19px;">{{__('messages.Our goal is opened for inventory libraries from the tributaries to take care of the next generation.')}} </p>
                                
                    </div>
                </div>
                
            </div>
    
            </div>
        </div>
    </div>
      <!-------------------------------------------------------------->

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
</section>


<!--Things for Kids-->
<section id="activity" class="section-wrapper">
    <div class="container">

        <!--Upper Part-->
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 text-center">

                <div class="horizontal-heading">
                    <h6>{{__('messages.Our Activity')}}</h6>
                </div>
            </div>
        </div>
        <div class="activity-lower">
            <div class="row">
                <!--Activity Left-->
                <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                    <!--Activity Left Tab 1-->
                    <div dir="ltr" lang="en" class="left-activity">
                        <h6>{{__('messages.Home work:')}}</h6>
                        <p>{{__('messages.The teacher sends the selected assignment to the students via the platform, and monitors the students performance remotely.')}}</p>
                       
                        <button type="button" class="btn btn-about smooth-scroll"  style="margin-right:60%;">
                            {{__('messages.See Video')}}
                        </button>
                    </div>
                    <!--Activity Left Tab 2-->
                    <div dir="ltr" lang="en" class="left-activity">
                        <h6 class="head-tab2">{{__('messages.Follow-up of the cognitive development of the student:')}}</h6>
                        <p>{{__('messages.The results of the exercises are recorded in the database of each student and it enables to track the cognitive development of the child throughout the primary stage.')}}</p>
                        
                        <button type="button" class="btn btn-about smooth-scroll"  style="margin-right:60%;">
                            {{__('messages.See Video')}}
                        </button>
                    </div>
                </div>
                <!--Activity Right-->
                <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6">
                    <!--Activity Right Tab 1-->
                    <div dir="ltr" lang="en" class="right-activity">
                        <h6>{{__('messages.Readable stories:')}}</h6>
                        <p>{{__('messages.recorded by stories to allow your child to enjoy special moments of story telling and stories.')}}</p>
                        
                        <button type="button" class="btn btn-about smooth-scroll"  style="margin-right:60%;">
                            {{__('messages.See Video')}}
                        </button>
                    </div>
                    <!--Activity Right Tab 2-->
                    <div dir="ltr" lang="en" class="right-activity">
                        <h6>{{__('messages.Interactive Exercise:')}}</h6>
                        <p>{{__('messages.Determination of the level of Identity and Language for pupil and tests his liver memory.')}}</p>
                        <button type="button" class="btn btn-about smooth-scroll" style="margin-right:60%;">
                            {{__('messages.See Video')}}
                        </button>
                    </div>
                </div>
               
                    <!--Activity center Tab 1-->
                    

                <!--Middle Image-->
                <div class="activity-mid-image">
                    <div class="activity-mid-tab">
                        <img src="{{asset('img/kids-activity/kids_img.jpeg')}}" alt="Things for kids image">
                    </div>
                </div>

            </div>
        </div>


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
</section>
<!--Things for Kids Ends-->

<!--Events Section-->
<section id="events" class="section-wrapper">

    <div class="container">
        <!-- upper part -->
        <div id="events_upper">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">

                    <div class="horizontal-heading">
                        <h6>{{__('messages.OUR Stories')}}</h6>
                    </div>
                    <div class="horizontal-heading">
                        <h2 style="font-family: yaseerregular, sans-serif !important; ">{{__('messages.The stories are categorized by academic level and difficulty level, as well as by type')}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- upper part Ends -->

        <!-- Lower Part -->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated">
                <div class="events-items dental-care text-center  box-shadow">

                    <div class="events-items-img">
                        <img src="{{asset('img/events/Educational Cards.png')}}" class="img-fluid" alt="Dental Care">

                    </div>

                    <div class="events-items-content">
                        <h6><a href="#">{{__('messages.Educational Cards')}}</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" >
                <div class="events-items music-drawing text-center  box-shadow">

                    <div class="events-items-img">
                        <img src="{{asset('img/events/school story.png')}}" class="img-fluid"
                            alt="Music and Drawing Workshop">

                    </div>

                    <div class="events-items-content">
                    <h6><a href="#">{{__('messages.School Stories')}}</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated">
                <div class="events-items health-consciousness text-center box-shadow">

                    <div class="events-items-img">
                        <img src="{{asset('img/events/funny story.png')}}" class="img-fluid" alt="Health Consciousness">

                    </div>

                    <div class="events-items-content">
                        
                    <h6><a href="#">{{__('messages.Funny Stories')}}</a></h6>
                        
                    </div>

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated">
                <div class="events-items dental-care text-center  box-shadow">

                    <div class="events-items-img">
                        <img src="{{asset('img/events/life skills.png')}}" class="img-fluid" alt="Dental Care">

                    </div>

                    <div class="events-items-content">
                        <h6><a href="#">{{__('messages.Life Skills')}}</a></h6>
                    </div>

                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated">
                <div class="events-items music-drawing text-center  box-shadow">

                    <div class="events-items-img">
                        <img src="{{asset('img/events/mathematics.png')}}" class="img-fluid"
                            alt="Music and Drawing Workshop">
                    </div>
                    <div class="events-items-content">
                        
                            <h6> <a href="#">{{__('messages.Mathematics')}}  </a></h6>
                       
                    </div>

                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated">
                <div class="events-items health-consciousness text-center box-shadow">

                    <div class="events-items-img">
                        <img src="{{asset('img/events/science and nature.png')}}" class="img-fluid"
                            alt="Health Consciousness">

                    </div>

                    <div class="events-items-content">
                        
                     <h6><a href="#">{{__('messages.Sciences and Nature')}}</a></h6>
                        
                    </div>

                </div>
            </div>
        </div>
        <!-- Lower Part Ends -->
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
</section>
<!--Events Section Ends-->

<!--Offer Section-->
<section id="offer" class="section-wrapper">
    <div class="container">

        <!-- upper part -->
        <div id="offer_upper">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">

                    <div class="horizontal-heading">
                        <h6>{{__('messages.How to use the platform in the classroom')}}</h6>

                    </div>
                    <div class="horizontal-heading">
                        <h2 style="color: black; font-family: yaseerregular, sans-serif !important; ">{{__('messages.During the story class the teacher presents the story in class with or without the audio version')}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- upper part Ends -->

        <!-- Lower Part -->
        <div class="row">

            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="offer-items full-day text-center" style="height:450px;">
                    <img src="{{asset('img/offer/offer_FDP_img.png')}}" class="img-fluid" alt="Full Day Program">
                    <h6>{{__('messages.Follow-up:')}}</h6>
                    <p>{{__('messages.The teacher can identify the extent of the student’s comprehension of the read story after answering the interactive exercises associated with it, which have been carefully prepared to suit the student’s intellectual development and to test his lexical balance.')}}</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="offer-items large-playground text-center" style="height:400px;margin-top:10%;">
                    <img src="{{asset('img/offer/offer_LPLay_img.png')}}" class="img-fluid" alt="Large Playground">
                    <h6>{{__('messages.Homework:')}}</h6>
                    <p>{{__('messages.The teacher can specify the story that the students are required to work on at home, and whose performance is monitored remotely through his account on the platform.')}}</p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="offer-items expert-teacher text-center" style="height:350px;margin-top:20%;">
                    <img src="{{asset('img/offer/offer_LP_img.png')}}" class="img-fluid" alt="Learning Program">
                    <h6>{{__('messages.Interactive exercises:')}}</h6>
                    <p>{{__('messages.they are carried out in the classroom, each student logs into the platform individually, or the teacher chooses a student to perform it directly in front of the group.')}}</p>
                </div>
            </div>
            

            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="offer-items learning-program text-center " style="height:290px;margin-top:30%;">
                    <img src="{{asset('img/offer/offer_ET_img.png')}}" class="img-fluid" alt="Expert Teachers">
                    <h6>{{__('messages.Reading aloud:')}}</h6>
                    <p>{{__('messages.Students read aloud and take turns reading in order to improve their performance and boost their confidence.')}}</p>
                </div>
            </div>

        </div>
        <!-- Lower Part Ends -->


    </div>

     
</section>


<!--Stats Section Ends-->
<section id="about" class="section-wrapper">
<div class="container">
<div class="row">
    <div dir="rtl" lang="ar" class="card">
        <div dir="rtl" lang="ar" class="card-body">
        <div dir="rtl" lang="ar" class="row">
            <div class="col-sm-12 col-md-6 ">
                <img src="{{asset('img/events/ss.jpg')}}" class="img-fluid rounded-start">
            </div>
            <div class="col-sm-12 col-md-6  text-center" style="padding-bottom: 20px;margin-top: 20px">
                <div class="horizontal-heading">
                    <h6>{{__('messages.SHARE UNIQUE MOMENTS WITH YOUR FAMILY MEMBRES')}}</h6><br><br>
                </div>
                <p style=" font-style:initial ; font-size:25px;">{{__('messages.We motivate the children to read and encourage them to complete the interactive exercises without errors in return for giving them certificates of appreciation extracted from the podium to keep as a souvenir')}}</p>
            </div>
            
        </div>

        </div>
    </div>
</div>
<div class="row py-3">
    <div class="card">
        <div class="card-body">
            <div dir="rtl" lang="ar" class="row">
                <div dir="rtl" lang="ar" class="col-sm-12 col-md-6 ">
                    <img src="{{asset('img/classes/class-img2.jpg')}}" class="img-fluid rounded-start" style="height: 300px; width:600px;">
                </div>
                <div dir="rtl" lang="ar" class="col-sm-12 col-md-6  text-center" style="padding-bottom: 20px;margin-top: 20px">
                    <div class="horizontal-heading">
                        <h6>{{__('messages.PRESENCE OF THE PLATFORM ON DIGITALE DEVICES')}}</h6><br><br>
                    </div>
                    <p style=" font-style:initial; font-size:25px">{{__('messages.Available on most electronic devices, smart phones, tablets')}}<br></p>
                    <p style=" font-style:initial; font-size:25px">{{__('messages.and on systems: Windows, Mac, Android')}}<br></p>
                    <p style=" font-style:initial; font-size:25px;">{{__('messages.and on browsers: Chrome and Edge')}}</p>
                </div>
                
            </div>

        </div>
    </div>
</div>

</div>






            <!--Stats BG Image-->
            <div id="stats-bg-img">
                <div class="stats-bg-img1">
                    <img src="{{asset('img/stats/stats-bg-element1.png')}}" class="img-fluid" alt="Element 1">
                </div>
                <div class="stats-bg-img2">
                    <img src="{{asset('img/stats/stats-bg-element2.png')}}" class="img-fluid" alt="Element 2">
                </div>
            </div>
            <!--Stats BG Image Ends-->
        </div>
  

   <!--call BG Image Ends-->
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
          
    </section>
    
@endsection