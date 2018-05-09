<!--==========================
    Promotion Section
  ============================-->
<section >
    <div class="container-fluid">

    <header class="section-header">
        <h3 class="section-title">Promotions Now</h3>  
    </header>        

    <div class="row">
        <div class="col-md-8 col-sm-12 wow fadeInUp">

        @foreach ($promotions_ll as $promotion)
        <div class="card promotion land-l">
                {!! $promotion->embed_code !!}
            </div>
        @endforeach
        </div>
        <div class="col-md-2 col-sm-6 wow fadeInUp">
            @foreach ($promotions_lp as $promotion)
            <div class="card promotion port-l">
                    {!! $promotion->embed_code !!}
            </div>
        @endforeach
        </div>
        <div class="col-md-2 col-sm-6 wow fadeInUp">
        @foreach ($promotions_p as $promotion)
            <div class="card promotion port">
                    {!! $promotion->embed_code !!}
            </div>
        @endforeach
           
        </div>

    </div>
</div>
</section>