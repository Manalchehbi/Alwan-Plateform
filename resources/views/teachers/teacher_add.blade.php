@extends('layouts.master')

@section('content')
@include('layouts.dashboard_menu')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Import Teachers</h1>
    <a href="{{route('all/teacher/list')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Import Teachers</h6>
    </div>
    <div class="col-md-6" style="margin-top: 20px;">
        <a href="{{ route('new_teacher') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
    <form method="POST" action="{{route('upload/teacher')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                
                <div class="col-md-12 mb-3 mt-3">
                    <p>Please Upload CSV in Given Format <a href="{{ asset('files/sample-data.csv') }}" target="_blank">Sample CSV Format</a></p>
                </div>
                {{-- File Input --}}
                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                    <span style="color:red;">*</span>File Input(Datasheet)</label>
                    <input 
                        type="file" 
                        class="form-control form-control-user @error('file') is-invalid @enderror" 
                        id="exampleFile"
                        name="file" 
                        value="{{ old('file') }}">

                    @error('file')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-user float-right mb-3">Upload Teachers</button>
            <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('all/teacher/list') }}">Cancel</a>
        </div>
    </form>
</div>

</div>

            <!-- container-fluid -->
        </div>
    </div>
   
    @endsection