@extends('layouts.admin')

@section('page-content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <link rel="stylesheet" href="{{ asset('plugins/fileupload/fileupload.css') }}">

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Story
        <small>Edit</small>
      </h1>
    </section>

          <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Eidt Story</h3>
          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('stories/') }}"> List </a>
            <a class="btn btn-primary" href="{{ URL::to('stories/' . $story->id) }}"> Show </a>

          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('stories.update',['id' => $story->id] ) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="panel panel-default tile">
                        <!--<div class="panel-heading">Register</div> -->
                        <div class="panel-body">
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">Story</label>
                                <div class="col-md-6">
                                        <textarea rows="4" cols="50" id="content" class="form-control" name="content" required autofocus> {{ $story->content }} </textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                           <!-- category -->
                       <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-md-4 control-label">Category</label>
                        <div class="col-md-6">
                            <select id="category_id" class="form-control select2" name="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($story->category_id == $category->id) selected='selected' @endif >{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     {{-- Image 1 --}}
                     <!-- display image -->
                     <div class="form-group{{ $errors->has('dispimage') ? ' has-error' : '' }}">
                        <label for="dispimage" class="col-md-4 control-label">Image</label>

                        <div class="col-md-6">
                            <img style="width:150px;" src="{{asset('storage/' . $story->thumbnail_1)}}" >

                        </div>
                    </div>
                     <div class="form-group{{ $errors->has('image_1') ? ' has-error' : '' }}">                        
                        <label for="image_1" class="col-md-4 control-label">Photo 1</label>
                            <div class="col-md-6">                        
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail form-control"></div>                            
                            <div>
                                <span class="btn btn-file btn-alt btn-sm">
                                    <span class="fileupload-new">Change photo</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input id="image_1" type="file" name="image_1" />
                                </span>
                                <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Remove</a>
                                @if ($errors->has('image_1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            </div>    
                        </div> 
                        
                        {{-- Image 2 --}}
                        <!-- display image -->
                     <div class="form-group{{ $errors->has('dispimage') ? ' has-error' : '' }}">
                        <label for="dispimage" class="col-md-4 control-label">Image</label>

                        <div class="col-md-6">
                            <img style="width:150px;" src="{{asset('storage/' . $story->thumbnail_2)}}" >

                        </div>
                    </div>
                     <div class="form-group{{ $errors->has('image_2') ? ' has-error' : '' }}">                        
                        <label for="image_2" class="col-md-4 control-label">Photo 2</label>
                            <div class="col-md-6">                        
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail form-control"></div>                            
                            <div>
                                <span class="btn btn-file btn-alt btn-sm">
                                    <span class="fileupload-new">Change photo</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input id="image_2" type="file" name="image_2" />
                                </span>
                                <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Remove</a>
                                @if ($errors->has('image_2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            </div>    
                        </div> 

                         {{-- Image 3 --}}
                         <!-- display image -->
                     <div class="form-group{{ $errors->has('dispimage') ? ' has-error' : '' }}">
                        <label for="dispimage" class="col-md-4 control-label">Image</label>

                        <div class="col-md-6">
                            <img style="width:150px;" src="{{asset('storage/' . $story->thumbnail_3)}}" >

                        </div>
                    </div>
                     <div class="form-group{{ $errors->has('image_3') ? ' has-error' : '' }}">                        
                        <label for="image_3" class="col-md-4 control-label">Photo 3</label>
                            <div class="col-md-6">                        
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail form-control"></div>                            
                            <div>
                                <span class="btn btn-file btn-alt btn-sm">
                                    <span class="fileupload-new">Change photo</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input id="image_3" type="file" name="image_3" />
                                </span>
                                <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Remove</a>
                                @if ($errors->has('image_3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_3') }}</strong>
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
                                        <option @if($story->is_published == 'No') selected='selected' @endif value="No">No</option>
                                        <option @if($story->is_published == 'Yes') selected='selected' @endif value="Yes">Yes</option>
                                    </select>
        
                                </div>
                            </div>

                            <!-- ratings -->
                       <div class="form-group{{ $errors->has('ratings') ? ' has-error' : '' }}">
                        <label for="ratings" class="col-md-4 control-label">Ratings</label>
                        <div class="col-md-6">
                            <input type="number" id="ratings" name="ratings" min="0" step="1" value="{{$story->ratings}}" max="5">
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
    <script src="{{ asset('plugins/fileupload/fileupload.min.js') }}"></script>
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function(){
        CKEDITOR.replace( 'content',  {
                toolbar : 'Basic',
                uiColor : '#9AB8F3'
        });
        });
    </script>  
@endsection
