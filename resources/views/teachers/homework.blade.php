@extends('layouts.master-lay')

@section('page-name')

@php
$page="Homework";
@endphp

@endsection


@section('content')
<style>
img{
-webkit-touch-callout: none !important; 
 -webkit-user-select: none !important; }
</style>
<script>
window.oncontextmenu = function(event) {
     event.preventDefault();
     event.stopPropagation();
     return false;
};
function sendElem(e,prevId,destId,elemId){
    e.preventDefault;
   
    var previousTarget = document.querySelector("[data-id='"+prevId+"']");
    var element = document.getElementById(elemId);
    var nextTarget = document.querySelector("[data-id='"+destId+"']");
    var nbrChildren = nextTarget.children.length;
    if(nbrChildren > 1){
            alert('you have already selected a story!')
        }else{   
            setTimeout(function appendElem() {
                previousTarget.className="class2";
    console.log("droping");
    nextTarget.appendChild(element);
    window.scrollTo({top: 0, behavior: 'smooth'});
    if(destId=="distination"){
      
            document.getElementById("story_id").value= document.getElementById(elemId).getAttribute("data-id");
         element.setAttribute('onclick',"sendElem(event,'"+destId+"','"+prevId+"','"+elemId+"')" );

      
       
        }else if(document.getElementById("story_id").value==document.getElementById(elemId).getAttribute("data-id")){
            document.getElementById("story_id").value="";
            element.setAttribute('onclick',"sendElem(event,'"+destId+"','"+prevId+"','"+elemId+"')" );

        }
        nextTarget.className="input";  
            
    }, 200);
    
        }
}
 
</script>

<div class="container">
    <div class="row text-center">

        <div class=" col-sm-12 col-md-12 col-lg-12" style="
        padding: 20px 30px;
    " >
            <!-------------------- search bouton------------------------------>

            <div class="input-group">
                <div id="search-autocomplete" style="width: 100%;" class="form-outline">
                    <form action="{{route('search')}}" method='get' style="display: flex">
                        <input type="search" id="query" name='searchQuery' class="form-control" placeholder='Search' />

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-----------------end search bouton------------------------>
        </div> 


        <!-- upper part -->
        <div class=" col-sm-12 col-md-12 col-lg-12">

            <form action="{{route('sendHomework')}}" id="homework-form" method="post">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                        <div class="input" data-id="distination" 
                          >
                            <input required type="hidden" name="story_id" id="story_id" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center "
                        style="display: flex;padding: 15px; align-items: center;">






                        @csrf
                        <select required class="round" id="classe_id" name="choice">
                            <option selected="true" value disabled="disabled">{{__('messages.My classes')}}</option>
                            @foreach($classes as $classe)
                            <option value="{{ $classe->id }}"><a>{{ $classe->name }}</a></option>
                            @endforeach
                        </select>
                        <img class="" src="{{asset('/img/teacher/class.svg')}}" alt="">

                        <button class="btn btn-general btn-banner "  id="home-work-send" type="submit"
                            style="margin-top: 0px">{{__('messages.Send')}}</button>









                    </div>


                </div>
            </form>
        </div>



        <!--//////////////////////////  NEW /////////////////////////////////-->







        <!--//////////////////////////  NEW /////////////////////////////////-->



    </div>


</div>

<!------------------------------------------------------------------------------------------------->

<div class="container">
    <!-- Lower Part -->
    <div class="row">

        @foreach($stories as $str)
        <div  onclick="sendElem(event,'distination_{{$str->id}}','distination','story_{{$str->id}}')" class="col-sm-12 col-sm-12 col-md-6 col-lg-4 wow fadeInLeft animated" data-wow-delay="200ms">
            <div class="events-items music-drawing text-center  box-shadow">
                <div class="input" data-id="distination_{{$str->id}}" >
                    <div class="events-items-img">
                        <a href="#">
                        <img src="{{ asset('file_storage/'. $str->picture) }}" class="img-fluid story-img"
                            alt="Music and Drawing Workshop" id="story_{{$str->id}}" data-id="{{$str->id}}"
                           draggable="true">
                    
                        </a>
                        </div>
                </div>

                <div class="events-items-content">
                    <a href="#">
                        <h6>{{$str->name}}</h6>
                    </a>
                </div>

            </div>
        </div>
        @endforeach


    </div>


    <div>

        {{$stories->links()}}
    </div>
</div>

<script>
    document.getElementById('home-work-send').onclick = function(e){
    e.preventDefault();
   
    var story = document.getElementById('story_id');
    var classe = document.getElementById('classe_id');
    console.log(classe.value)
    if(classe.value!=""&&story.value!=""){

       document.getElementById("homework-form").submit();
    }else{
        alert("{{__('messages.please select a class and a story')}}")
    }

    };
    const basicAutocomplete = document.querySelector('#search-autocomplete');
     const data = ['One', 'Two', 'Three', 'Four', 'Five'];
     const dataFilter = (value) => {
     return data.filter((item) => {
    return item.toLowerCase().startsWith(value.toLowerCase());
  });
};

new mdb.Autocomplete(basicAutocomplete, {
  filter: dataFilter
});
</script>

</div>


@endsection