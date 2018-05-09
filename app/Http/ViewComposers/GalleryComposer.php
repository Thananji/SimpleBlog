<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Models\Story;

class GalleryComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $galleries;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->galleries = Story::where('is_published', 'Yes')->orderBy('updated_at', 'asc')->take(12)->get();
        /*
        $this->galleries =  Cache::remember('gda-vc-countries', 1200, function () {
            return Country::all();
        }); */
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('galleries', $this->galleries);
    }
}