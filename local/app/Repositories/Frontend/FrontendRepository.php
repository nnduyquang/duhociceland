<?php

namespace App\Repositories\Frontend;


use App\Menu;

class FrontendRepository implements FrontendRepositoryInterface
{
    public function getFrontend()
    {
        $data=[];
        return $data;
    }

    public function getFrontendCommon()
    {
        // TODO: Implement getFrontendCommon() method.
    }

    public function getAllMenuFrontend()
    {
        $menu = new Menu();
        $data = $menu->getAllOrderBy('order');
        return $data;
    }


}