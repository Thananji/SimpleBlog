@extends('layouts.admin')

@section('page-content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog Category
        <small>Items</small>
      </h1>
    </section>
        <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Blog Categories</h3>

          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('categories/create') }}"> New </a>
          </div>
        </div>
        <!-- /.box-header -->
<!-- list ofproducts -->
 
  <!-- Responsive Table -->
    <div class="box-body" >
        <div class="table-responsive overflow">
            <table class="table tile">
              <thead>
                  <tr>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                 @foreach ($categories as $category)
                 <tr>
                   <td>{{$category->name}}</td>
                  <td>{{$category->slug}}</td>
                  <td>
                      <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('categories/' . $category->id) }}">Show</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('categories/' . $category->id . '/edit') }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>


                        </table>

                      </div>

                  </div>
                  </section>

@endsection
