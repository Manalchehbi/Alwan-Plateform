   @extends('layouts.master-lay')
    
    @section('page-name')
         
       @php
         $page="Stories-Guide";    
       @endphp
        
       @endsection
        
       @section('css')
    
    <style>
    .fr1{
        display: flex;
        margin-left:200px ;
        text-align: center;
        
    }
    .cont3{
        margin-top: -4px;
        text-align: center;
        
    }
    .dropdown1{
        margin-left: -40px;
        margin-right: 40px;
    }
    .dropdown2{
        margin-right: 40px;
    }
      </style>
      @endsection
@section('content')
        
<div class="container">
<div class="row text-center">
            <!-- upper part -->
        <div class=" col-sm-12 col-md-12 col-lg-12">

            <form action="/storiesguide">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px">
                        <div>
                            <select class="round" onChange="this.form.submit()" name="acchoice" id="id_cat">
                                <option  value="">{{__('messages.academic level')}}</option>
                                @foreach($academic as $aca)
                                @if($aca->id==$acr)
                                <option selected  value="{{$aca->id}}">
                                    <a>{{$aca->name}}</a>
                                </option>
                                @else 
                                <option value="{{$aca->id}}">
                                    <a>{{$aca->name}}</a>
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px">
                        <div>
                            <select class="round" onChange="this.form.submit()" name="dfc" id="id_dif">
                                <option   value="">{{__('messages.difficulty level')}}</option>
                                @foreach($difficulty as $def)
                                
                                @if($def->id==$dfc)
                                <option selected value="{{$def->id}}">
                                    <a>{{$def->name}}</a>
                                </option>
                                @else 
                                <option value="{{$def->id}}">
                                    <a>{{$def->name}}</a>
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                       

                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="padding-bottom: 20px">
                        <div  >
                            <select class="round" onChange="this.form.submit()" name="tp" id="id_tp">
                                <option  value="">{{__('messages.type')}}</option>
                                @foreach($theme as $type)
                                @if($type->id==$tp)
                                <option selected value="{{$type->id}}">
                                    <a>{{$type->name}}</a>
                                </option>
                                @else 
                                <option value="{{$type->id}}">
                                    <a  >{{$type->name}}</a>
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>



        <!--//////////////////////////  NEW /////////////////////////////////-->
              
            </div>
            
        </div>
    
    <div class="container">
            <!-- Lower Part -->
        <div class="scrolling-pagination">
            <div class="row">
                @php
                     $counter=0;
                @endphp
    
        @foreach($story as $str)

                 @php
                     $counter++;
                @endphp
               
                <div class="col-sm-12 col-md-6 col-lg-4 py-3 wow fadeInLeft animated" style="padding-bottom: 20px">
                    <div class="events-items dental-care text-center  box-shadow">
                       
                            <div class="events-items-img">
                                <a 
                                @if(Auth::user()->isStudent()&& Auth::user()->is_freetrial==true)
                                @if($counter > 5)
                                href="#"

                                onclick="alert('Please subscribe');"
                                @else
                                href="{{ url('choice/'.$str->id) }}"
                                @endif
                                @else 
                                href="{{ url('choice/'.$str->id) }}"
                                @endif
                                
                                >
                                <img src="{{ asset('file_storage/'. $str->picture) }}" class="img-fluid" class="img-fluid" alt="Dental Care">
                                </a>
                            </div>
                        
        
                        <div class="events-items-content">
                            <a href="{{ url('choice/'.$str->id) }}">
                                <h6>{{$str->name}}</h6>
                            </a>
                        </div>
        
                    </div>
                </div>
                @endforeach
        
                
            </div>
        
            {{$story->links()}} 
        <div>
                  
                
    </div>
           
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>  


    @endsection