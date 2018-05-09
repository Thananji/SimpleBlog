@extends('layouts.admin')

@section('page-content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet">

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promotion
        <small>Edit</small>
      </h1>
    </section>

          <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Eidt Promotion</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('promotions/') }}"> List </a>
            <a class="btn btn-primary" href="{{ URL::to('promotions/' . $promotion->id) }}"> Show </a>

          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('promotions.update',['id' => $promotion->id] ) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="panel panel-default tile">
                        <!--<div class="panel-heading">Register</div> -->
                        <div class="panel-body">

                            <div class="form-group{{ $errors->has('embed_code') ? ' has-error' : '' }}">
                                <label for="embed_code" class="col-md-4 control-label">Embed Code</label>
                                <div class="col-md-6">
                                        <textarea rows="4" cols="50" id="embed_code" class="form-control" name="embed_code" required> {{$promotion->embed_code}} </textarea>
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
                                    <option @if($promotion->type == 'Large_Landscape') selected='selected' @endif value="Large_Landscape">Large_Landscape</option>
                                    <option @if($promotion->type == 'Portrait') selected='selected' @endif value="Portrait">Portrait</option>
                                    <option @if($promotion->type == 'Large_Portrait') selected='selected' @endif value="Large_Portrait">Large_Portrait</option>
                                </select>
    
                            </div>
                        </div>
    
                                <!-- order -->
                                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                    <label for="order" class="col-md-4 control-label">Order</label>
        
                                    <div class="col-md-6">
                                        <input id="order" type="number" step="1" class="form-control" name="order" value="{{ $promotion->order}}" required >
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
                                    <option @if($promotion->is_published == 'No') selected='selected' @endif value="No">No</option>
                                    <option @if($promotion->is_published == 'Yes') selected='selected' @endif value="Yes">Yes</option>
                                </select>
    
                            </div>
                        </div>

                        
                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>


                        </div>
                        </div>

                    </form>
 
      </div>

    </section>
</div>


@endsection

@section('child-scripts')
        <script src="{{ asset('js/fileupload/fileupload.min.js') }}"></script>
        <script src="{{ asset('js/select2/select2.min.js') }}"></script>
        <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
        <script>
            $(document).ready(function(){
                $(".select2").select2();
                CKEDITOR.replace( 'description' );
            });
        </script>
@endsection
