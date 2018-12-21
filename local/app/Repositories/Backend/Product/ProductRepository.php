<?php

namespace App\Repositories\Backend\Product;

use App\CategoryItem;
use App\Direction;
use App\Location;
use App\Repositories\EloquentRepository;
use App\Seo;
use App\Unit;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return \App\Product::class;
    }



    public function showCreateProduct()
    {
        $data = [];
        $categoryItem = new CategoryItem();
        $categoryProduct = $categoryItem->getAllParent('order', CATEGORY_PRODUCT);
        $data['categoryProduct'] = $categoryProduct;
        return $data;
    }

    public function createNewProduct($request)
    {
        $data = [];
        $seo = new Seo();
        if (!$seo->isSeoParameterEmpty($request)) {
            $seo = Seo::create($request->all());
            $request->request->add(['seo_id' => $seo->id]);
        } else {
            $request->request->add(['seo_id' => null]);
        }
        $parameters = $this->_model->prepareParameters($request);
        $result = $this->_model->create($parameters->all());
        $attachData = array();
        foreach ($parameters['list_category_id'] as $key=>$item){
            $attachData[$item]=array('type'=>CATEGORY_PRODUCT);
        }
        $result->categoryitems(CATEGORY_PRODUCT)->attach($attachData);
        return $data;
    }

    public function showEditProduct($id)
    {
        $data['product'] = $this->find($id);
        $categoryItem = new CategoryItem();
        $categoryProduct = $categoryItem->getAllParent('order', CATEGORY_PRODUCT);
        $data['categoryProduct'] = $categoryProduct;
        return $data;
    }

    public function updateProduct($request, $id)
    {
        $data = [];
        $parameters = $this->_model->prepareParameters($request);
        $result = $this->update($id,$parameters->all());
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
        $syncData = array();
        foreach ($parameters['list_category_id'] as $key=>$item){
            $syncData[$item]=array('type'=>CATEGORY_PRODUCT);
        }
        $result->categoryitems(CATEGORY_PRODUCT)->sync($syncData);
        return $data;
    }

    public function deleteProduct($id)
    {
        $data = [];
        $this->delete($id);
        return $data;
    }


}