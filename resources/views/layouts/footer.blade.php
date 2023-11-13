
 <!-------------------------------Footer Section  Landing Page--------------------------------------------------------------->
 @if($page=="Landing-Page")
 
    <!--Footer Section-->
    <footer id="footer-top">
        <div class="section-wrapper">
            <div class="container">
                <div id="contact-content">
                    <div class="row">
                        <!--Contact Content 01-->
                        <div class="col-sm-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="contact-content1">
                                <div class="contact-content-head">
                                    <a href="{{url('index')}}"><img src="{{asset('img/contact/footer_logo.png')}}" alt="Ankur Logo" width="60%"></a>
                                </div>
                                <div class="contact-content1-body">
                                    <p>{{__('messages.Lorem ipsum dolor sit amet consectetur adipisicing elit Natus culpa qui officiis animi')}}</p>
                                </div>
                                <div class="contact-content1-foot" style="font-family: AraHamahZanki, sans-serif !important; ">
                                    <form action="#">
                                        <input type="text" id="email" name="email" placeholder="{{__('messages.Email')}}" required>
                                        <input type="submit" id="subscribe" value="{{__('messages.Subscribe')}}">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--Contact Content 02-->
                    

                        <!--contact Content 04-->
                        <div class="col-sm-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="contact-content4">
                                <div class="contact-content1-head">
                                    <h6>{{__('messages.LOCATION')}}</h6>
                                    <img src="{{asset('img/icons/Underline-1.png')}}" alt="underline image">
                                </div>
                                <div class="contact-content4-body">
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i>1101, {{__('messages.Your Adress')}}</li>
                                        <li><a href="mailto:"><i class="fa fa-envelope-o"></i>{{__('messages.yourmail@mail.com')}}</a></li>
                                        <li><a href="tel:+012-345-678"><i class="fa fa-phone"></i>+012-345-678</a></li>
                                    </ul>
                                </div>
                                <div class="contact-content4-foot">
                                    <ul>
                                        <li><a href="#!"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-Bottom Area-->
        <div id="footer-main">
            <div class="bottom-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="footer-main-left">
                                <p><a href="#"><span>{{__('messages.And IT Themes')}}</span></a> &#169;&nbsp;{{__('messages.2020. All Rights Reserved')}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="footer-main-right">
                                <p><a href="#!"><span>{{__('messages.Sitemap')}} -</span></a> <a href="#!"><span>{{__('messages.Terms of Service')}} -</span></a> <a
                                        href="#!"><span>{{__('messages.Privacy Policy')}}</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-Bottom Area Ends-->
        <!--Footer Elements-->
        <div class="footer-elements">
            <img src="{{asset('img/icons/element-2.png')}}" class="img-fluid" alt="">
        </div>
    </footer>
    <!--Footer Section Ends-->




<!---------------------------------Scripte Landing page----------------------------------------------------------------------->

   
    <!--JQuery-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!--Bootstrap js')}}-->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Easing smooth scroll js')}} -->
    <script src="{{asset('vendor/ease-scroll/jquery.easing.1.3.js')}}"></script>
    <!-- WOW js')}} -->
    <script src="{{asset('vendor/wow/js/wow.min.js')}}"></script>

    <!--Owl Carousel js')}}-->
    <script src="{{asset('vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <!--Waypoint js')}}-->
    <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <!--Counter Up js')}}-->
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <!-- Magnific Popup js')}} -->
    <script src="{{asset('vendor/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <!--Custom js')}}-->
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        new WOW().init();
    </script>



    @endif





    @if($page=="Student-Page" || $page=="Teacher-Page" || $page=="Useful-Page"||
     $page=="Workpaper-Page" || $page=="Homework" || $page=="Stories-Guide" ||
      $page=="Archive-page"||$page=="Espace-Page"||$page=="Box-Page" ||
      $page=="details-Page" ||$page=="School-Page"|| $page=='StatisticsMonth-Page' || $page=='StatisticsLevel-Page'||
      $page=='ProfilStudent-Page' || $page=='ProfilTeacher-Page'||$page=='HomeworkDetail-Page'||$page=='Subscribe-Page'||$page=='Subscribe-Page' || $page=='Free-Page'||
      $page=='SchoolLogin-Page')

<!-----Script student/teacher /storiesguide/ workssheets / usefule ressources  pages ------------------------------------------->
    
  
    
    <!--JQuery-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--Bootstrap js')}}-->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Easing smooth scroll js')}} -->
    <script src="{{asset('vendor/ease-scroll/jquery.easing.1.3.js')}}"></script>
    <!-- WOW js')}} -->
    <script src="{{asset('vendor/wow/js/wow.min.js')}}"></script>

    <!--Owl Carousel js')}}-->
    <script src="{{asset('vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <!--Waypoint js')}}-->
    <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <!--Counter Up js')}}-->
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <!-- Magnific Popup js')}} -->
    <script src="{{asset('vendor/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <!--Custom js')}}-->
    <script src="{{asset('js/app.js')}}"></script> 



@endif

@if($page=="Useful-Page")

<!----------------Useful_Page(usefule ressources)-------------------------------------------------------------->

<!--
 <script src="{{asset('scripts/jquery.min.js?ver=1.2.0')}}"></script>
    <script src="{{asset('scripts/bootstrap.bundle.min.js?ver=1.2.0')}}"></script>
    <script src="{{asset('scripts/main.js?ver=1.2.0')}}"></script>  -->
          

@endif


@if($page=="Login-Admin-Page" || $page=="Login-School-Page")
<!----------------------------------- Script Admin/ school Login pages ----------------------------------------------------------->

    <script type="text/javascript" src="/js/main-administration.js"></script>

    @endif




    @if($page=="Login-Student-Page")
<!----------------------------------- Script Student Login pages ----------------------------------------------------------->

     <script type="text/javascript" src="{{ asset('/js/main-student.js') }}"></script>


     @endif


     @if($page=="Login-Teacher-Page")
<!----------------------------------- Script Teacher Login pages ----------------------------------------------------------->

     <script type="text/javascript" src="/js/main-teacher.js"></script>
     @endif


     @if($page=="Login-Page")
<!----------------------------------- Script Espace Login pages ----------------------------------------------------------->     

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    @endif

