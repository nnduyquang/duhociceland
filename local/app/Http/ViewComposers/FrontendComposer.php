<?php

namespace App\Http\ViewComposers;

use App\Repositories\Frontend\FrontendRepository;
use Illuminate\View\View;

class FrontendComposer
{
    public $frontend=[];

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(FrontendRepository $home)
    {
        $this->frontend = $home->getFrontendCommon();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('listFrontendCommon', $this->frontend);
    }
}