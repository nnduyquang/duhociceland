<?php

namespace App\Repositories\Backend\Menu;

interface MenuRepositoryInterface
{
    public function createNewMenuItem($request);

    public function updateMenuItem($request);

    public function deleteMenuItem($id);

    public function orderMenu($request);

    public function orderItem(array $menuItems, $parentId);

    public function getAllMenuItem();
}