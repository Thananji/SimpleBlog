
<!--==========================
    Promotion Section
  ============================-->
<section >
    <div class="container">

    <header class="section-header ">
        <h3 class="section-title gallery-header">Gallery</h3>  
    </header>        

    <div class="row">

            @foreach ($galleries as $gallery)
            <div class="col-md-3 col-12  gallery-item filter-app wow fadeInUp">
                <div class="card">
                <img src="{{asset('storage/'. $gallery->thumbnail_1) }}" class="card-img" alt="">
                </div>
            </div>

            @endforeach

<!--
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div>
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div>
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div>
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div>
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div>
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div>
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div>
    <div class="col-md-3 col-12 card gallery-item filter-app wow fadeInUp">

    <img src="img/slider3.jpg" class="card-img" alt="">

    </div> -->
</div>
</section>