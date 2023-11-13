<!-----------------workpaper/useful-page/teacher_page/------>


@if($page=="Teacher-Page" || $page=="Useful-Page" || $page=="Workpaper-Page" || $page=="Landing-Page" ||
$page=="Student-Page" || $page=="Homework" || $page=="Archive-page" || $page=="Espace-Page" ||$page=="Box-Page" || $page=="details-Page" || 
$page=="School-Page" || $page=='StatisticsMonth-Page' || $page=='StatisticsLevel-Page'||
$page=='ProfilStudent-Page' || $page=='ProfilTeacher-Page'|| $page=='HomeworkDetail-Page'||
$page=='Subscribe-Page'||$page=='Free-Page'|| $page=='SchoolLogin-Page')
<!--style link -->
<!--Required Meta Tags-->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<!--Title-->
<title>@yield('title')</title>


<!-- Favicon -->

<link rel="shortcut icon" href="{{asset('img/fav-icon/logo_favicon.png')}}" type='image/x-icon'>
<!-- Google Fonts-->
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400&display=swap" rel="stylesheet">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
<!--Bootstrap CSS-->
<link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!-- WOW CSS -->
<link rel="stylesheet" href="{{asset('vendor/wow/css/wow.min.css')}}">
<!--Owl Carousel Css-->
<link rel="stylesheet" href="{{asset('vendor/owl-carousel/css/owl.carousel.min.css')}}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{asset('vendor/magnific-popup/css/magnific-popup.css')}}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<!-- Color CSS -->
<link rel="stylesheet" href="{{asset('css/color.css')}}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

@endif

@if($page=="Teacher-Page" || $page=="Student-Page")
<!--------------teacher_page----------------------------------->
<link rel="stylesheet" href="{{asset('/assets/css/stories.css')}}">
<!--<link rel="stylesheet" href="{{ asset('assets/css/styles-teacher.css') }}">-->
@endif


@if($page=="Useful-Page")
<!--------------Useful-Page----------------------------------->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/assets/css/stories.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endif





@if($page=="Stories-Page")
<!---------------------stories---------------------------------------------------->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('/assets/css/stories.css')}}">
<link rel="stylesheet" href="{{asset('/assets/js/stories.js')}}">

@endif

@if($page=="Login-Page")
<!-------------------------------------------Espace login----------------------------------------->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Navbar</title>
<link href="/assets/css/normalize.css" rel="stylesheet">
<link href="/assets/css/espace.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="/assets/js/espace.js" rel="stylesheet">
<!-- Color CSS -->
<link rel="stylesheet" href="css/color.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">


@endif

@if( $page=="Stories-Guide")
<!------------------------------stories guide---------------------------------------->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('/assets/css/stories.css')}}">
<link rel="stylesheet" href="{{asset('/assets/js/stories.js')}}">
<!-- Favicon -->
<link rel="shortcut icon" href="img/fav-icon/fav_icon.png">
<!-- Google Fonts-->
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400&display=swap" rel="stylesheet">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
<!--Bootstrap CSS-->
<link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!-- WOW CSS -->
<link rel="stylesheet" href="{{asset('vendor/wow/css/wow.min.css')}}">
<!--Owl Carousel Css-->
<link rel="stylesheet" href="{{asset('vendor/owl-carousel/css/owl.carousel.min.css')}}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{asset('vendor/magnific-popup/css/magnific-popup.css')}}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<!-- Color CSS -->
<link rel="stylesheet" href="{{asset('css/color.css')}}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">


@endif

<style>


body nav  div.nav-container span.badge{

    
    font-family: "Londrina Solid", monospace;
    letter-spacing: 1px;
    margin: 0;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    position: absolute;
    top: -5px;
    right: -5px;
    padding: 5px 10px;
    border-radius: 50%;
    color: white;
    background: red;

}

@media (max-width: 991px){
    body > nav > div.nav-container > nav > ul > li:nth-child(1) > a{
        color: beige;
}
body nav  div.nav-container span.badge{
    margin-right: 0 !important;
    float: left !important;
    top: -10px !important;
    z-index: 1000;
    position: relative;
    left: 100px;
}
}
</style>

@if(App::getLocale()=="ar")
<style>
    @media (max-width: 991px){
body nav  div.nav-container span.badge{
    
    left: -5px;
}
}
    html,
    body {
        height: 100%;
        font-family: 'yaseerregular', sans-serif !important;
    }

    div,
    p,
    li,form{

        font-family: 'yaseerregular', sans-serif !important;
    }

    nav ul li a,
    nav ul li a:visited {
        font-family: 'AraHamahZanki', sans-serif;
        font-weight: 900;
    }

    h1,
    h2,
    h3,
    h4 {
        font-family: "AraHamahZanki", sans-serif !important;
        margin-bottom: 0;
    }

    h5,
    h6 {
        font-family: "AraHamahZanki", sans-serif !important;
        margin-bottom: 0;
    }

    .about-list ul li {
        text-align: initial;
    }

    /********* navbar styles ***********/

    @media (min-width: 991px) {
        .nav-list {
            display: flex !important;
            flex-direction: row-reverse;
            margin-right: 0px;
            margin-left: 0px;
            justify-content: space-between;
        }


        .nav-container {
            display: flex;
            justify-content: space-between;
            flex-direction: row-reverse;

        }


        .brand {
            padding: 0 10px;
            position: unset;
            display: block;
            max-width: 255px;
        }

        .nav-logo-img {

            width: 100% !important;

        }

    }


    /********* navbar styles ***********/
</style>

@endif