<?php

namespace App\Http\ViewComposers;

use App\Repositories\Frontend\FrontendRepository;
use Illuminate\View\View;

class MenuComposer
{
    public $listMenu;

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(FrontendRepository $frontend)
    {
        $this->listMenu = $frontend->getAllMenuFrontend();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('listMenu', $this->listMenu);
    }
}