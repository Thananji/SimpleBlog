<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Slide;
use Illuminate\Support\Facades\Cache;

class SlidesComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $slides;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->slides = Slide::where('is_published', 'Yes')->orderBy('updated_at', 'asc')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('slides', $this->slides);
    }
}