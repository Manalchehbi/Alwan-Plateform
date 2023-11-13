@extends('layouts.master-lay')
@section('page-name')

@php
$page="Free-Page";
@endphp

@endsection
@section('title')

{{__('messages.Alwan')}}

@endsection



@section('content')
@if (session()->has('success'))

<div class="row text-center" style="padding: 5px;">
	<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%;">
		<strong ><a  class="text-center"href=" {{ route('password.request') }}">Click here to get your password</a></strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

	</div>
</div>

@endif
<link rel="stylesheet" type="text/css" href="{{asset('css/freetrial.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

  <img class="wave" src="{{asset('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('img/bg.svg')}}">
		</div>
		<div dir="rtl" lang="ar"   class="login-content">
			<form method="POST" action="{{ route('registration') }}">
            
                @csrf
				<img src="{{asset('img/avatar.svg')}}">
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>{{__('messages.Username')}}</h5>
           		   		<input type="text" class="input" id="name" name="name" value="{{ old('name') }}">
           		   </div>
           		</div>
                   <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                            <h5>{{__('messages.Email')}}</h5>
                            <input type="text" class="input" id="email" name="email"  value="{{ old('email') }}">
                    </div>
                 </div>
				 {{--
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>{{__('messages.Password')}}</h5>
           		    	<input type="password" class="input" id="password" name="password" value="{{ old('password') }}">
            	   </div>
            	</div>
                <div class="input-div pass">
                    <div class="i"> 
                         <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                         <h5>{{__('messages.Comfirm Password')}}</h5>
                         <input type="password" class="input" >
                 </div>
              </div>--}}
			  <a href="{{url('/free-trial')}}">{{__('messages.Login')}}</a>
            	<input type="submit" class="btn" value="Register">
            </form>
        </div>
    </div>
    <script>
      
const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
    </script>
@endsection
