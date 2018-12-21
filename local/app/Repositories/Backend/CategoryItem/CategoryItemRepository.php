<?php

namespace App\Repositories\Backend\CategoryItem;


use App\Repositories\EloquentRepository;
use App\Seo;

class CategoryItemRepository extends EloquentRepository implements CategoryItemRepositoryInterface
{
    public function getModel()
    {
        return \App\CategoryItem::class;
    }

    public function getAllCategoryItem($type)
    {
        switch ($type) {
            case'categoryproduct':
                return $this->_model->getAllCategoryByType(CATEGORY_PRODUCT);
                break;
            case'categorypost':
                return $this->_model->getAllCategoryByType(CATEGORY_POST);
                break;
        }
    }

    public function showCreateCategoryItem($type)
    {
        switch ($type) {
            case'categoryproduct':
                return $this->_model->getAllParent('order', CATEGORY_PRODUCT);
                break;
            case'categorypost':
                return $this->_model->getAllParent('order', CATEGORY_POST);
                break;
        }
    }

    public function createNewCategoryItem($request, $type)
    {
        $seo = new Seo();
        if (!$seo->isSeoParameterEmpty($request)) {
            $seo = Seo::create($request->all());
            $request->request->add(['seo_id' => $seo->id]);
        } else {
            $request->request->add(['seo_id' => null]);
        }
        $parameters = $this->_model->prepareParameters($request, $type);
        $result = $this->_model->create($parameters->all());
    }

    public function showEditCategoryItem($id, $type)
    {
        $data['categoryItem'] = $this->find($id);
        switch ($type) {
            case'categoryproduct':
                $data['categoryItems'] = $this->_model->getAllParent('order', CATEGORY_PRODUCT);
                break;
            case'categorypost':
                $data['categoryItems'] = $this->_model->getAllParent('order', CATEGORY_POST);
                break;
        }
        return $data;
    }

    public function updateCategoryItem($request, $id, $type)
    {
        $parameters = $this->_model->prepareParameters($request, $type);
        $result = $this->update($id, $parameters->all());
        $seo = new Seo();
        if (!$seo->isSeoParameterEmpty($request)) {
            if(is_null($result->seo_id)){
                $data = Seo::create($request->all());
                $result->update(['seo_id'=>$data->id]);
            }else{
                $result->seos->update($parameters->all());
            }
        }else{
            if(!is_null($result->seo_id)){
                $result->seos->delete();
            }
        }
    }

    public function deleteCategoryItem($id)
    {
        $this->delete($id);
    }


}