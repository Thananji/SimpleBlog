@extends('layouts.admin')

@section('page-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Story Category
        <small>New</small>
      </h1>
    </section>

          <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Category</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('categories') }}"> Back </a>
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.store') }}" >
                        {{ csrf_field() }}
                        <!--<div class="panel-heading">Register</div> -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-4 control-label">Slug</label>
                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required >
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            <a class="btn btn-primary" href="{{ URL::to('categories') }}"> Cancel </a>
                                
                            </div>
                        </div>

                    </form>
      </div>
      </div>
    </section>
</div>


@endsection

