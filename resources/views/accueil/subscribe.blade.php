@extends('layouts.master-lay')
@section('page-name')
@php
$page="Subscribe-Page";
@endphp
@endsection
@section('title')

{{__('messages.Alwan')}}

@endsection
@section('content')
<link rel="stylesheet" href="/assets/fonts/linearicons/style.css">
	<link rel="stylesheet" href="/assets/css/stylesubscribe.css">
  
  
  <div class="container">
			<div class="inner" style="padding-top: 10%;margin-left:30%">
				<img src="/assets/images/image-1.png" alt="" class="image-1">
        @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <form action="#" method="POST">
            @csrf
					<h3>Make A Participation</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" name="nomComplet" placeholder="First and Last name">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="number" class="form-control" placeholder="Phone Number" name="tele">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="email" class="form-control" placeholder="Mail" name="email">
					</div>
				
          <div class="input-group">
                                 
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Teacher
                                            <input type="radio" checked="checked" name="statut" value="Teacher">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Student
                                            <input type="radio" name="statut" value="Student">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" >Send</button>
					
				</form>
				<img src="/assets/images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>

	
@endsection