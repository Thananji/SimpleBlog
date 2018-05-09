<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer(
            'sections.slider', 'App\Http\ViewComposers\SlidesComposer'          
        ); 
        View::composer(
            'sections.promotions', 'App\Http\ViewComposers\PromotionsComposer'          
        );
        View::composer(
            'sections.gallery', 'App\Http\ViewComposers\GalleryComposer'          
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
