<!DOCTYPE html>
<html lang="en">


@yield('page-name')
<!-------- HEAD ---------------->

<head>
    @include('layouts.head')

    @yield('css')
</head>
<!----------------- END HEAD ---------------->
@if($page=="Espace-Page")
<body>
@elseif($page=="Landing-Page")
<body class="zdbody"
    padding-bottom: 100px;">
@else
<body class="zdbody" style="height: max-content;
    padding-bottom: 100px;">
@endif
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
                   <!-- <a href="{{url('mailbox')}}" class="notification" style="margin-left:20% ">
                              
                   
                    </a>-->

                    <a href="{{url('mailbox')}}" ><img src="{{asset('img/nav/mail.png')}}" class="img-fluid" alt="mail">@if(session('undoneHomework')!=0)
                       
                        <span class="badge">
                            {{ session('undoneHomework') }}
                        </span>
                       
                        @endif 
                    {{__('messages.Mail Box')}}
                    </a>
                    
                    
                </li>
                <li>
                    <a href="{{url('storiesguide')}}"><img src="{{asset('img/nav/storytelling.png')}}" class="img-fluid" alt="Story guide">{{__('messages.Story guide')}}</a>
                </li>
                <li>
                    <a href="{{ url('useful_ressources') }}"><img src="{{asset('img/nav/descriptor.png')}}" class="img-fluid" alt="Useful resources">{{__('messages.Useful Ressources')}}</a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('img/nav/certif.png')}}" class="img-fluid" alt="certifications">{{__('messages.certifications')}}</a>
                </li>
                <li >
                    <div id="navbar-img">
                  <img src="{{asset('img/nav/nav-bg.png')}}" class="img-fluid" alt="Navbar img">
                 </div>
                 <a class="" href="/logout" data-toggle="modal" data-target="#logoutModal">
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
   @else

    <!-------- NAV ---------------->

    @include('layouts.navbar')

    <!----------------- END NAV ---------------->
   @endif

   @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
    @if (session()->has('failure'))
   
        <div class="row text-center" style="padding: 5px;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 100%;">
                <strong> {{ session()->get('failure') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        </div>
    
    @endif
    @if (session()->has('success'))

        <div class="row text-center" style="padding: 5px;">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%;">
                <strong> {{ session()->get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        </div>
    
    @endif
    @yield('content')





    <!-------- FOOTER ---------------->

    @include('layouts.footer')

    <!----------------- END FOOTER ---------------->
</body>

</html>