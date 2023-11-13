

<!--Navbar Area  Landing Page-->


  @if($page=='Landing-Page'||$page=='Subscribe-Page' || $page=='Free-Page')
    <nav  class="navigation">
        <div class="nav-container">
            <div class="brand">
                <a href="{{url('index')}}"><img  class="nav-logo-img" src="{{asset('img/logo/logo.png')}}" class="img-fluid" alt="" width="40%"></a>
            </div>
            <nav>
                <div class="nav-mobile" ><a id="navbar-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">
                    <li>
                        <a href="{{url('index')}}"><img src="{{asset('img/nav/nav_home.png')}}" class="img-fluid" alt="Home"  > {{__('messages.Home')}} </a>

                    </li>
                    <li>
                        <a href="{{url('free-trial')}}"><img src="{{asset('img/icons/jewels.png')}}" class="img-fluid"  alt="Home" >{{__('messages.Free Trial')}}</a>
                    </li>
                    <li>
                        <a href="{{url('subscribe')}}"> <img src="{{asset('img/nav/programs_nav.png')}}" class="img-fluid"
                            alt="Home" >{{__('messages.Subscribe')}}</a>
                    </li>
                    <li>
                        <a href="#footer-top"><img src="{{asset('img/nav/contact_nav.png')}}" class="img-fluid" alt="Home" >{{__('messages.Contact')}}</a>
                    </li>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                       <li class="nav-item">
                       <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                        </li>
                         @endforeach
                  
                </ul>
            </nav>
        </div>
        <div id="navbar-img">
            <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
        </div>
    </nav>
    @endif
    <!--Navbar Area Ends-->







<!--Navbar Area  Teacher Page-->
@if($page=='Teacher-Page' ||$page=='Homework'||$page=="Workpaper-Page" ||$page=="Archive-page" ||$page=="details-Page" ||$page=="ProfilTeacher-Page"||
    $page=='HomeworkDetail-Page')
    <nav class="navigation">
    <div class="nav-container">
        <div class="brand">
            <a href="{{url('index')}}"><img class="nav-logo-img"  src="{{asset('img/logo/logo.png')}}" alt="" width="40%"></a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="{{url('teacher-page')}}"><img src="{{asset('img/nav/nav_home.png')}}" class="img-fluid" alt="Story guide">{{__('messages.Teacher Page')}}</a>
                </li>
                <li>
                    <a href="{{url('storiesguide')}}"><img src="{{asset('img/nav/storytelling.png')}}" class="img-fluid" alt="Story guide">{{__('messages.Story guide')}}</a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('img/nav/homework.png')}}" class="img-fluid" alt="Homework">{{__('messages.Homework')}}</a>
                    <ul class="navbar-dropdown">
                        @if(Auth::user() && Auth::user()->isTeacher())

                                <li>
                                    <a href="{{ url('homework') }}">{{__('messages.Send Homework')}}</a>
                                </li>
                        @endif
                                <li>
                                    <a href="{{url('archieve')}}">{{__('messages.Homework Archive')}}</a>
                                </li>
                               
                            </ul>
                </li>
               
                <li>
                    <a href="{{ url('worksheets') }}"><img src="{{asset('img/nav/checklist.png')}}" class="img-fluid" alt="Work paper">{{__('messages.Work paper')}}</a>
                </li>
                
                <li>
                    <a href="{{ url('useful_ressources') }}"><img src="{{asset('img/nav/descriptor.png')}}" class="img-fluid" alt="Useful resources">{{__('messages.Useful resources')}}</a>
                </li>
                
           
                @if(Auth::user() && Auth::user()->isSchool())

                <li>
                    <a href="{{ url('administration') }}"><img src="{{asset('img/nav/School.png')}}" class="img-fluid" alt="Administration">{{__('messages.Back to School')}}</a>
                </li>
          @endif
          

            <li>
             <div id="navbar-img">
           <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
          </div>
          <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        {{__('messages.Logout')}}
        </a>
      </li>
      

          
        
            </ul>
        </nav>
    </div>
    <div id="navbar-img">
        <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
    </div>
</nav>

@endif
   <!--Navbar Area Ends-->







      <!--Navbar Area Student Page-->
@if($page=='Student-Page' ||$page=="Box-Page")
      <nav class="navigation">
    <div class="nav-container">
        <div class="brand">
            <a href="{{url('index')}}"><img class="nav-logo-img" src="{{asset('img/logo/logo.png')}}" alt="" width="40%" ></a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="{{url('st')}}"><img src="{{asset('img/nav/nav_home.png')}}" class="img-fluid" alt="Story guide">{{__('messages.Student Page')}}</a>
                </li>
                <li>
                    <a href="{{url('mailbox')}}"><img src="{{asset('img/nav/mail.png')}}" class="img-fluid" alt="mailk">{{__('messages.Mail Box')}} <div id="cercle">{{ session('undoneHomework') }}</div></a>
                    
                </li>
                <li>
                    <a href="{{ url('useful_ressources') }}"><img src="{{asset('img/nav/descriptor.png')}}" class="img-fluid" alt="Useful resources">{{__('messages.Useful Ressources')}}</a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('img/nav/certif.png')}}" class="img-fluid" alt="certifications">{{__('messages.certifications')}}</a>
                </li>
                <li class="nav-item">
                    <div id="navbar-img">
                  <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
                 </div>
                 <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               {{__('messages.Logout')}}
               </a>
             </li>
            </ul>
        </nav>
    </div>

    <div id="navbar-img">
        <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img" >
    </div>
    
</nav>
@endif   
<!--Navbar Area Ends-->




 

@if($page=="Stories-Guide" || $page=="Useful-Page")
@if(Auth::user() && Auth::user()->isStudent())
<nav class="navigation">
    <div class="nav-container">
        <div class="brand">
            <a href="{{url('index')}}"><img class="nav-logo-img" src="{{asset('img/logo/logo.png')}}" alt="" width="40%" ></a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="{{url('st')}}"><img src="{{asset('img/nav/nav_home.png')}}" class="img-fluid" alt="Story guide">{{__('messages.Student Page')}}</a>
                </li>
                <li>
                    <a href="{{url('mailbox')}}"><img src="{{asset('img/nav/mail.png')}}" class="img-fluid" alt="mailk">{{__('messages.Mail Box')}}<div id="cercle">{{ session('undoneHomework') }}</div></a>
                    
                </li>
                <li>
                    <a href="{{ url('useful_ressources') }}"><img src="{{asset('img/nav/descriptor.png')}}" class="img-fluid" alt="Useful resources">{{__('messages.Useful Ressources')}}</a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('img/nav/certif.png')}}" class="img-fluid" alt="certifications">{{__('messages.certifications')}}</a>
                </li>
                <li>
                 <a href="/logout" data-toggle="modal" data-target="#logoutModal">
               {{__('messages.Logout')}}
               </a>
             </li>
             
            </ul>
        </nav>
    </div>

    <div id="navbar-img">
        <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img" >
    </div>
    
</nav>
@elseif(Auth::user() && Auth::user()->isTeacher()|| Auth::user() && Auth::user()->isSchool())
<nav class="navigation">
    <div class="nav-container">
        <div class="brand">
            <a href="{{url('index')}}"><img class="nav-logo-img"  src="{{asset('img/logo/logo.png')}}" alt="" width="40%"></a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="{{url('teacher-page')}}"><img src="{{asset('img/nav/nav_home.png')}}" class="img-fluid" alt="Story guide">{{__('messages.Teacher Page')}}</a>
                </li>
                <li>
                    <a href="{{url('storiesguide')}}"><img src="{{asset('img/nav/storytelling.png')}}" class="img-fluid" alt="Story guide">{{__('messages.Story guide')}}</a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('img/nav/homework.png')}}" class="img-fluid" alt="Homework">{{__('messages.Homework')}}</a>
                    <ul class="navbar-dropdown">
                        @if(Auth::user() && Auth::user()->isTeacher())

                        <li>
                            <a href="{{ url('homework') }}">{{__('messages.Send Homework')}}</a>
                        </li>
                         @endif
                                <li>
                                    <a href="{{url('archieve')}}">{{__('messages.Homework Archive')}}</a>
                                </li>
                               
                            </ul>
                </li>
               
                <li>
                    <a href="{{ url('worksheets') }}"><img src="{{asset('img/nav/checklist.png')}}" class="img-fluid" alt="Work paper">{{__('messages.Work paper')}}</a>
                </li>
                
                <li>
                    <a href="{{ url('useful_ressources') }}"><img src="{{asset('img/nav/descriptor.png')}}" class="img-fluid" alt="Useful resources">{{__('messages.Useful resources')}}</a>
                </li>
                
                @if(Auth::user() && Auth::user()->isSchool())

                <li>
                    <a href="{{ url('administration') }}"><img src="{{asset('img/nav/School.png')}}" class="img-fluid" alt="Administration">{{__('messages.Back to School')}}</a>
                </li>
          @endif
           

            <li class="nav-item">
             <div id="navbar-img">
           <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
          </div>
          <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        {{__('messages.Logout')}}
        </a>
      </li>

      

          
        
            </ul>
        </nav>
    </div>
    <div id="navbar-img">
        <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
    </div>
</nav>
@endif
@endif   
<!--Navbar Area Ends-->




    <!--Navbar Area School Page-->
      @if($page=='School-Page' || $page=='StatisticsMonth-Page' || $page=='StatisticsLevel-Page')
      <nav class="navigation">
    <div class="nav-container">
        <div class="brand">
            <a href="{{url('index')}}"><img class="nav-logo-img" src="{{asset('img/logo/logo.png')}}" alt="" width="40%" ></a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="{{url('administration')}}"><img src="{{asset('img/nav/nav_home.png')}}" class="img-fluid" alt="Story guide">{{__('messages.School Page')}}</a>
                </li>
                <li>
                    <a href="{{url('statistiquebymonth')}}"><img src="{{asset('img/nav/mail.png')}}" class="img-fluid" alt="mailk">{{__('messages.Statistique By Month')}}</a>
                    
                </li>
                <li>
                    <a href="{{url('statistiquebylevel')}}"><img src="{{asset('img/nav/descriptor.png')}}" class="img-fluid" alt="Useful resources">{{__('messages.Statistique By Level')}}</a>
                </li>
                
                <li class="nav-item">
                    <div id="navbar-img">
                  <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
                 </div>
                 <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               {{__('messages.Logout')}}
               </a>
             </li>
            </ul>
        </nav>
    </div>

    <div id="navbar-img">
        <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img" >
    </div>
    
</nav>
@endif
<!--Navbar Area Ends-->