@extends('layouts.admin')

@section('page-content')

<link rel="stylesheet" href="{{ asset('plugins/fileupload/fileupload.css') }}">

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promotion
        <small>New</small>
      </h1>
    </section>

          <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Promotion</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('promotions') }}"> List </a>
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
            <!-- form start -->           
            <form class="form-horizontal" role="form" method="POST" action="{{ route('promotions.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('embed_code') ? ' has-error' : '' }}">
                            <label for="embed_code" class="col-md-4 control-label">Embed Code</label>
                            <div class="col-md-6">
                                    <textarea rows="4" cols="50" id="embed_code" class="form-control" name="embed_code" required> {{ old('embed_code') }} </textarea>
                                @if ($errors->has('embed_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('embed_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                            
                             <!-- type -->
                       <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type" class="col-md-4 control-label">Type</label>
                        <div class="col-md-6">
                            <select id="type" class="form-control select2 select2-hidden-accessible" name="type" required>
                                <option @if(old('type') == 'Large_Landscape') selected='selected' @endif value="Large_Landscape">Large_Landscape</option>
                                <option @if(old('type') == 'Portrait') selected='selected' @endif value="Portrait">Portrait</option>
                                <option @if(old('type') == 'Large_Portrait') selected='selected' @endif value="Large_Portrait">Large_Portrait</option>
                            </select>

                        </div>
                    </div>

                            <!-- order -->
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                <label for="order" class="col-md-4 control-label">Order</label>
    
                                <div class="col-md-6">
                                    <input id="order" type="number" step="1" class="form-control" name="order" value="{{ old('order') }}" required >
                                    @if ($errors->has('order'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('order') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- is_published -->
                       <div class="form-group{{ $errors->has('is_published') ? ' has-error' : '' }}">
                        <label for="is_published" class="col-md-4 control-label">Is ready to display?</label>
                        <div class="col-md-6">
                            <select id="is_published" class="form-control select2" name="is_published">
                                <option @if(old('is_published') == 'No') selected='selected' @endif value="No">No</option>
                                <option @if(old('is_published') == 'Yes') selected='selected' @endif value="Yes">Yes</option>
                            </select>

                        </div>
                    </div>
                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                        </div>
                        </div>

                    </form>
 
      </div>
      </div>

@endsection

@section('child-scripts')
        <script src="{{ asset('plugins/fileupload/fileupload.min.js') }}"></script>

@endsection




