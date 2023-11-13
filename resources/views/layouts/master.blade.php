<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dashboard Home</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.ico') }}">
    <link href="{{ URL::to('../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ URL::to('../plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('../plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::to('../plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ URL::to('../plugins/morris/morris.css') }}">
    <link href="{{ URL::to('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    {{-- message toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body class="{{ $theme }}">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{route('home')}}" class="logo">
                    <img src="{{ URL::to('assets/images/logo-light.png') }}" class="logo-lg" alt="" height="50">
                    <img src="{{ URL::to('assets/images/logo-sm.png') }}" class="logo-sm" alt="" height="24">
                </a>
            </div>
            <!-- Search input -->
            <div class="search-wrap" id="search-wrap">
                <div class="search-bar">
                    <input class="search-input" type="search" placeholder="Search" />
                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                        <i class="mdi mdi-close-circle"></i>
                    </a>
                </div>
            </div>
            
            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">
                <img src="{{asset('assets/fonts/sun.svg')}}" id="theme-toggle" >
                
                <li class="dropdown notification-list list-inline-item">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                src="{{asset('assets/fonts/man.svg')}}" id="avatar">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Setting
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                </div>
                        </li>
                    <li class="list-inline-item dropdown notification-list d-none d-md-inline-block">
                        <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                            <i class="fas fa-search noti-icon"></i>
                        </a>
                    </li>
                    <!-- language-->
            
                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="fas fa-expand noti-icon"></i>
                        </a>
                    </li>
                    
                    <!-- notification -->
                    <li class="dropdown notification-list list-inline-item">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fas fa-bell noti-icon"></i>
                            <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                            <!-- item-->
                            <h6 class="dropdown-item-text">Notifications</h6>
                            <div class="slimscroll notification-item-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                    <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">View all <i class="fi-arrow-right"></i></a>
                        </div>
                    </li>
                  


                    
                    
                </ul>
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
        
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">are you sure you want to logout ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Yes</a>
                </div>
            </div>
        </div>
    </div>
        <!-- Top Bar End -->
      
        <!-- content -->
        @yield('content')
        <!-- End content -->
    </div>
    <!-- END wrapper -->

   <!-- jQuery  -->
   <script src="{{ URL::to('assets/js/jquery.min.js') }}"></script>
   <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ URL::to('assets/js/metismenu.min.js') }}"></script>
   <script src="{{ URL::to('assets/js/jquery.slimscroll.js') }}"></script>
   <script src="{{ URL::to('assets/js/waves.min.js') }}"></script>
   <script>
    var body = document.getElementsByTagName('body')[0];
    var dark_theme_class = 'dark-theme';
    var theme = getCookie('theme');
    var icon = document.getElementById("theme-toggle");
   

    if(theme != '') {
        body.classList.add(theme);
    }

    document.addEventListener('DOMContentLoaded', function () {


        $('#theme-toggle').on('click', function () {

            if (body.classList.contains(dark_theme_class)) {
                icon.src="{{asset('assets/fonts/sun.svg')}}";
                body.classList.remove(dark_theme_class);
                $('#mode').text('Light Mode')
                setCookie('theme', 'light');

            }
            else {
                icon.src="{{asset('assets/fonts/moon.svg')}}";
                $('#mode').text('Dark Mode')

                body.classList.add(dark_theme_class);

                setCookie('theme', 'dark-theme');

            }

        });

    });

    // enregistrement du theme dans le cookie

    function setCookie(name, value) {

        var d = new Date();
        d.setTime(d.getTime() + (365*24*60*60*1000));
        var expires = "expires=" + d.toUTCString();
        console.log(expires)
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
        console.log(document.cookie)

    }




    // methode de recuperation du theme dans le cookie

    function getCookie(cname) {

        var theme = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');

        for(var i = 0; i < ca.length; i++) {

            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }

            if (c.indexOf(theme) == 0) {
                return c.substring(theme.length, c.length);
            }
        }
        return "";
    }

</script>
   <script src="{{ URL::to('../plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

   <!-- Required datatable js -->
   <script src="{{ URL::to('../plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
   <!-- Buttons examples -->
   <script src="{{ URL::to('../plugins/datatables/dataTables.buttons.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/jszip.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/pdfmake.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/vfs_fonts.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.html5.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.print.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.colVis.min.js') }}"></script>
   <!-- Responsive examples -->
   <script src="{{ URL::to('../plugins/datatables/dataTables.responsive.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ URL::to('../plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::to('../plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::to('assets/pages/dashboard.init.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::to('assets/pages/datatables.init.js') }}"></script>

   <!-- App js -->
   <script src="{{ URL::to('assets/js/app.js') }}"></script>
   
</body>
</html>














