@extends('layouts.admin')

@section('page-content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <link rel="stylesheet" href="{{ asset('plugins/fileupload/fileupload.css') }}">

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slide
        <small>Edit</small>
      </h1>
    </section>

          <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Eidt Slide</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('slides/') }}"> List </a>
            @if($slide->exists)
            <a class="btn btn-primary" href="{{ URL::to('slides/' . $slide->id) }}"> Show </a>
            @endif
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
            @if($slide->exists)
            <form class="form-horizontal" role="form" method="POST" action="{{ route('slides.update',['id' => $slide->id] ) }}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
            @else
            <form class="form-horizontal" role="form" method="POST" action="{{ route('slides.store') }}" enctype="multipart/form-data">            
            @endif            
                        {{ csrf_field() }}
                        <div class="panel panel-default tile">
                        <!--<div class="panel-heading">Register</div> -->
                        <div class="panel-body">

                            <!-- title -->
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $slide->title) }}" required autofocus>
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            <!-- content -->

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="content" class="col-md-4 control-label">Content</label>
                                    <div class="col-md-6">
                                            <textarea rows="4" cols="50" id="content" class="form-control" name="content" required> {{ old('content', $slide->content) }} </textarea>
                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                             {{-- Image --}}
                              <!-- display image -->
                     <div class="form-group{{ $errors->has('dispimage') ? ' has-error' : '' }}">
                            <label for="dispimage" class="col-md-4 control-label">Image</label>
    
                            <div class="col-md-6">
                                <img style="width:150px;" src="{{asset('storage/' . $slide->image)}}" >
    
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">                        
                                <label for="image" class="col-md-4 control-label">Image</label>
                                    <div class="col-md-6">                        
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail form-control"></div>                            
                                    <div>
                                        <span class="btn btn-file btn-alt btn-sm">
                                            <span class="fileupload-new">Change photo</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input id="image" type="file" name="image" />
                                        </span>
                                        <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Remove</a>
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    </div>    
                                </div> 

                                <!-- is_published -->
                           <div class="form-group{{ $errors->has('is_published') ? ' has-error' : '' }}">
                            <label for="is_published" class="col-md-4 control-label">Is ready to display?</label>
                            <div class="col-md-6">
                                <select id="is_published" class="form-control select2" name="is_published">
                                    <option @if(old('is_published', $slide->is_published) == 'No') selected='selected' @endif value="No">No</option>
                                    <option @if(old('is_published', $slide->is_published) == 'Yes') selected='selected' @endif value="Yes">Yes</option>
                                </select>
    
                            </div>
                        </div>

                        <!-- title -->
                        <div class="form-group{{ $errors->has('button_anchor') ? ' has-error' : '' }}">
                                <label for="button_anchor" class="col-md-4 control-label">Button Anchor</label>
                                <div class="col-md-6">
                                    <input id="button_anchor" type="text" class="form-control" name="button_anchor" value="{{ old('button_anchor', $slide->button_anchor) }}">
                                    @if ($errors->has('button_anchor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('button_anchor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        
                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                        @if($slide->exists)
                                        Update
                                        @else
                                        Create
                                        @endif
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
<script src="{{ asset('plugins/fileupload/fileupload.min.js') }}"></script>


@endsection
