@extends('layouts.admin')

@section('page-content')

 <!-- Content Wrapper. Contains page content -->
  <div id="vue-content" class="content-wrapper">

      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stories
      </h1>
    </section>
        <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Stories</h3>

          <div class="box-tools pull-right">
            <a class="btn btn-primary" href="{{ URL::to('stories/create') }}"> New </a>
          </div>
        </div> <!--./ box-header -->
        <!-- /.box-header -->
      <div class="box-body">          
        <stories-list-admin /> 

      </div>
      </div> <!--./ box-primary --> 

  </section>
  </div>
@endsection


@section('child-scripts')

<script type="text/javascript">
  
    $(document).ready(function(){
       $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href') + "&id=" + $('#sel_categoryfilter').val() ;
        getProducts(url);

       });

      $('#btn_filter').click(function(){
        var url = "/products?id=" + $('#sel_categoryfilter').val();
        getProducts(url);
      })

       function getProducts(url) {        
                $.ajax({
                    url : url 
                }).done(function (data) {
                    $('#lstProducts').html(data);
                }).fail(function () {
                    alert('Products could not be loaded.');
                });
            }
    });

</script>

@endsection