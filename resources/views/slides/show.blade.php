@extends('layouts.admin')

@section('page-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promotion
        <small>Show</small>
      </h1>
    </section>

       <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Show Promotion</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('promotions') }}"> List </a>
            <a class="btn btn-primary" href="{{ URL::to('promotions/' . $promotion->id . '/edit') }}"> Edit </a>
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">

        <div class="col-md-12">
            <label class="col-md-4 control-label" for="name"> Image </label>

            <div class="col-md-6" for="name">
                <img style="width:150px;" src="{{asset('storage/' . $promotion->image)}}">

            </div>
        </div>
        <div class="col-md-12">
            <label class="col-md-4 control-label" for="slug"> Type </label>

            <div class="col-md-6" for="slug">
            {{$promotion->type}}
            </div>
        </div>        
        </div>
        </div>
        </div>
      </div>

      </section>
@endsection
