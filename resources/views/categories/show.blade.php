@extends('layouts.admin')

@section('page-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Story Category
        <small>Show</small>
      </h1>
    </section>

       <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Show Category</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('categories') }}"> Back </a>
            <a class="btn btn-primary" href="{{ URL::to('categories/' . $category->id . '/edit') }}"> Edit </a>
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
      <div class="col-md-10 col-md-offset-1">
                <div class="panel-body">
                    <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-8" for="name" class="form-control" >
                            {{$category->name}}
                            </div>
                        </div>

                      <div class="col-md-12 form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            
                            <label for="slug" class="col-md-4 control-label">Slug</label>
                            <div class="col-md-8" for="title" class="form-control" >
                            {{$category->slug}}
                            </div>
                        </div>

                </div>
            </div>
        </div>


      </div>
    </section>
</div>


@endsection
