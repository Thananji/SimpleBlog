@extends('layouts.admin')

@section('page-content')

 <!-- Content Wrapper. Contains page content -->
  <div id="vue-content" class="content-wrapper">

      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promotions
      </h1>
    </section>
        <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Promotions</h3>

          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('promotions/create') }}"> New </a>
          </div>
        </div> <!--./ box-header -->
        <!-- /.box-header -->
     <!-- Responsive Table -->
    <div class="box-body" >
      <div class="table-responsive overflow">
          <table class="table tile">
            <thead>
                <tr>
                <th>Promotion</th>
                <th>Type</th>
                <th>Order</th>
                <th>Is Published</th>
                <th>Actions</th>
              </tr>
              </thead>

              <tbody>
               @foreach ($promotions as $promotion)
               <tr>
                 <td><div style="width:150px;"> {!! $promotion->embed_code !!} </div></td>
                 <td>{{$promotion->type}}</td>
                 <td>{{$promotion->order}}</td>
                <td>{{$promotion->is_published}}</td>
                <td>
                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                  <a class="btn btn-small btn-success" href="{{ URL::to('promotions/' . $promotion->id) }}">Show</a>

                  <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                  <a class="btn btn-small btn-info" href="{{ URL::to('promotions/' . $promotion->id . '/edit') }}">Edit</a>
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
