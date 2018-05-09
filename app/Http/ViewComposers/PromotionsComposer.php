<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Promotion;

use Illuminate\Support\Facades\Cache;

class PromotionsComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $promotions_ll;
    protected $promotions_p;
    protected $promotions_lp;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        
        $this->promotions_ll = Promotion::where([['is_published','=', 'Yes'],['type','=', 'Large_Landscape'] ])->orderBy('order', 'asc')->take(3)->get();
        $this->promotions_p = Promotion::where([['is_published','=', 'Yes'],['type','=', 'Portrait'] ])->orderBy('order', 'asc')->take(3)->get();
        $this->promotions_lp = Promotion::where([['is_published','=', 'Yes'],['type','=', 'Large_Portrait'] ])->orderBy('order', 'asc')->take(1)->get();

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['promotions_ll'=> $this->promotions_ll, 'promotions_p'=> $this->promotions_p, 'promotions_lp'=> $this->promotions_lp] );
    }
}