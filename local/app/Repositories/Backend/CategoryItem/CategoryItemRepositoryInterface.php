<?php

namespace App\Repositories\Backend\CategoryItem;

interface CategoryItemRepositoryInterface
{
    public function getAllCategoryItem($type);

    public function showCreateCategoryItem($type);

    public function createNewCategoryItem($request,$type);

    public function showEditCategoryItem($id,$type);

    public function updateCategoryItem($request,$id,$type);

    public function deleteCategoryItem($id);
}
