@extends('layouts.master')

@section('content')
@include('layouts.dashboard_menu')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center ">
                        <div class="col-md-8">
                            <div class="page-title-box">
                                <h4 class="page-title">Update workSheetCategory</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Home / workSheetCategories / Update workSheetCategory</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right d-none d-md-block app-datepicker">
                                <input type="text" class="form-control" data-date-format="MM dd, yyyy" readonly="readonly" id="datepicker">
                                <i class="mdi mdi-chevron-down mdi-drop"></i>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <div class="page-heading">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Form Update Information</h4>
                                    <p class="sub-title">Update Information workSheetCategories</p>
                                    <form action="{{url('update/workSheetCategory')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                      <input type="hidden" name="id" value="{{ $workSheetCategory->id }}">    
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $workSheetCategory->name }}" type="text" id="name" placeholder="Enter name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="form-group row">
    <label for="example-tel-input" class="col-sm-2 col-form-label">Parent Category</label>
    <div class="col-sm-10">
        <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id" placeholder="Select parent">
             @if($workSheetCategory->parent!==null)
             
            <option value="">None</option>
            @foreach($workSheetCategories as $atem)
            <option value="{{$atem->id}}"  {{$workSheetCategory->parent->id== $atem->id ?'selected':''}}>{{$atem->name}}</option>
            @endforeach
             @else

            <option value="">None</option>
            @foreach($workSheetCategories as $atem)
            <option value="{{$atem->id}}" >{{$atem->name}}</option>
            @endforeach
            @endif
        </select>
        @error('parent')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Cannel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page-title -->
            </div>
            <!-- container-fluid -->
        </div>
    </div>
   
    @endsection