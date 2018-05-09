<!--==========================
    Intro Section
  ============================-->
  <section>
        <div class="intro-container1">
          <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
    
            <ol class="carousel-indicators"></ol>    
            <div class="carousel-inner" role="listbox"> 

                @foreach ($slides as $slide)
            <div class="carousel-item  @if ($loop->first) active @endif" style="background-image: url('{{asset('storage/'. $slide->image) }}');">
                  <div class="carousel-container">
                    <div class="carousel-content">
                      <h2>{{$slide->title}}</h2>
                      <p>{{$slide->content}}</p>
                    <a href="{{$slide->button_anchor}}" class="btn-get-started btn-slider scrollto">Get Started</a>
                    </div>
                  </div>
                </div>

                @endforeach

              <!-- <div class="carousel-item active" style="background-image: url('img/slider1.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>We are professional</h2>
                    <p>Building a website is, in many ways, an exercise of willpower. It’s tempting to get distracted by the bells and whistles of the design process, and forget all about creating compelling content</p>
                    <a href="#stories" class="btn-get-started btn-slider scrollto">Get Started</a>
                  </div>
                </div>
              </div>
    
              <div class="carousel-item" style="background-image: url('img/slider2.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>We are professional 2</h2>
                    <p>Building a website is, in many ways, an exercise of willpower. It’s tempting to get distracted by the bells and whistles of the design process, and forget all about creating compelling content.</p>
                    <a href="#promotions" class="btn-get-started btn-slider scrollto">Get Started</a>
                  </div>
                </div>
              </div>
    
              <div class="carousel-item" style="background-image: url('img/slider3.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>We are professional 3</h2>
                    <p>Building a website is, in many ways, an exercise of willpower. It’s tempting to get distracted by the bells and whistles of the design process, and forget all about creating compelling content.</p>
                    <a href="#stories" class="btn-get-started btn-slider scrollto">Get Started</a>
                  </div>
                </div>
              </div>   -->
            
            </div>
    
            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
    
            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          </div>
        </div>
      </section><!-- #intro -->