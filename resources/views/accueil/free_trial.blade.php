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

<link rel="stylesheet" type="text/css" href="{{asset('css/freetrial.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

  <img class="wave" src="{{asset('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('img/bg.svg')}}">
		</div>
		<div dir="rtl" lang="ar"   class="login-content">
            <form method="POST" action="{{ route('studentlog') }}">
            
                @csrf
				<img src="{{asset('img/avatar.svg')}}">
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>{{__('messages.Email')}}</h5>
           		   		<input type="text" class="input" name="email" value="{{ old('email') }}" required autocomplete="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>{{__('messages.Password')}}</h5>
           		    	<input type="password" class="input" name="password" required autocomplete="current-password">
            	   </div>
            	</div>
				<a href="{{route('register')}}">{{__('messages.Register Now')}}</a>
            	<input type="submit" class="btn" value="{{__('messages.Login')}}">
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
