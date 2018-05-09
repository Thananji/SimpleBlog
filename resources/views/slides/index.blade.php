@extends('layouts.admin')

@section('page-content')

 <!-- Content Wrapper. Contains page content -->
  <div id="vue-content" class="content-wrapper">

      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sliders
      </h1>
    </section>
        <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Sliders</h3>

          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('slides/create') }}"> New </a>
          </div>
        </div> <!--./ box-header -->
        <!-- /.box-header -->
     <!-- Responsive Table -->
    <div class="box-body" >
      <div class="table-responsive overflow">
          <table class="table tile">
            <thead>
                <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Is Published</th>
                <th>Actions</th>
              </tr>
              </thead>

              <tbody>
               @foreach ($slides as $slider)
               <tr>
                 <td><img style="width:100px;" src="{{asset('storage/'. $slider->image) }}"></td>
                 <td>{{$slider->title}}</td>
                 <td>{{$slider->content}}</td>
                <td>{{$slider->is_published}}</td>
                <td>
                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                  <a class="btn btn-small btn-success" href="{{ URL::to('slides/' . $slider->id) }}">Show</a>

                  <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                  <a class="btn btn-small btn-info" href="{{ URL::to('slides/' . $slider->id . '/edit') }}">Edit</a>
                  </td>
              </tr>
              @endforeach
              </tbody>
           </table>
         </div>
      </div>
    </section>

  </div>
@endsection
