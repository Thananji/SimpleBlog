@extends('layouts.main')

@section('content')


<!--==========================
    Header
  ============================-->
  <header id="header">
                <div class="container-fluid">
                  <div id="logo" class="pull-left">
                    <h1><a href="#intro" class="scrollto">The Simple Blog</a></h1>
                  </div>
            
                  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                       <li><a href="#aboutus">About Us</a></li>
                      <li><a href="#stories">Story Blogs</a></li>
                      <li><a href="#promotions">Promotions</a></li>
                      <li><a href="#gallery">Gallery</a></li>
                      <li><a href="#contact">Contact Us</a></li>
                    </ul>
                  </nav><!-- #nav-menu-container -->
                </div>
  </header><!-- #header -->

<div class="main-content">

<!-- slider  -->
<div id="intro" class="section-split">
        @include('sections.slider')
</div>

<!-- stories  -->
<div id="stories" class="section-split">
    <section >
        <stories-list-main />         
    </section>
</div>

<!-- promotions  -->
<div id="promotions" class="section-split section-fluid">
  @include('sections.promotions')
</div>

<!-- about us  -->
<div id="aboutus" class="section-split section-fluid">
    @include('sections.about')
  </div>

  <!-- gallery  -->
<div id="gallery" class="section-split">
    @include('sections.gallery')
  </div>

<!-- contact  -->
<div id="contact" class="section-split section-fluid">
    @include('sections.contact')
  </div>

<div class="container section-split section-fluid footer-container">
  <span> <a href="#" class="footer-link"><strong>Privacy Policy</strong> </a></span> <span> <a href="#" class="footer-link"><strong>Terms & Condition <strong></a> </span>
</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

</div>
@endsection
