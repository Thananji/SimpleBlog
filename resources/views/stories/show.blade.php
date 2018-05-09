@extends('layouts.admin')

@section('page-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Story
        <small>Show</small>
      </h1>
    </section>

       <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Show Story</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('stories') }}"> List </a>
            <a class="btn btn-primary" href="{{ URL::to('stories/' . $story->id . '/edit') }}"> Edit </a>
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">

        <div class="col-md-6">
        <div>  
        <img style="width:150px;" src="{{asset('storage/' . $story->thumbnail_1)}}">
        </div>
        <div>  
            <img style="width:150px;" src="{{asset('storage/' . $story->thumbnail_2)}}">
        </div>

        <div>  
            <img style="width:150px;" src="{{asset('storage/' . $story->thumbnail_3)}}">
        </div>
                

        </div>
        <div class="col-md-6">
                {{$story->content}}
        </div>
        
        </div>
        </div>
        </div>
      </div>

      </section>
@endsection
