<?php

namespace App\Repositories\Backend\CategoryItem;


use App\CategoryItem;
use App\Locale;
use App\Post;
use App\Repositories\EloquentRepository;
use App\Seo;
use App\Translation;

class CategoryItemRepository extends EloquentRepository implements CategoryItemRepositoryInterface
{
    public function getModel()
    {
        return \App\CategoryItem::class;
    }

    public function getAllCategoryItem($type)
    {
        $data = [];
        $locale = new Locale();
        $locales = $locale->getAll();
        $translation=new Translation();
        switch ($type) {
            case'categoryproduct':
                $translations=$translation->getAllTranslation(CATEGORY_ITEM_PRODUCT);
                break;
            case'categorypost':
                $translations=$translation->getAllTranslation(CATEGORY_ITEM_POST);
                break;
        }
        $categoryItems=array();
        foreach ($translations as $key=>$item){
            array_push($categoryItems, $item);
        }
        $data['categoryItems']=$categoryItems;
        $data['locales']=$locales;
        return $data;
//        switch ($type) {
//            case'categoryproduct':
//                return $this->_model->getAllParent('order', CATEGORY_PRODUCT);
//                break;
//            case'categorypost':
//                return $this->_model->getAllParent('order', CATEGORY_POST);
//                break;
//        }
    }

    public function showCreateCategoryItem($type)
    {
        $data = [];
        $locale = new Locale();
        $locales = $locale->getAll();
        $data['locales'] = $locales;
        switch ($type) {
            case'categoryproduct':
                $data['categoryItems']= $this->_model->getAllParent('order', CATEGORY_PRODUCT,1);
                break;
            case'categorypost':
                $data['categoryItems']= $this->_model->getAllParent('order', CATEGORY_POST,1);
                break;
        }
        return $data;
    }
    public function showCreateLangCategoryItem($translation_id, $locale_id,$type)
    {
        $data = [];
        $locale = new Locale();
        $lang=$locale->getLocaleById($locale_id);
        switch ($type) {
            case'categoryproduct':
                $data['categoryItems']= $this->_model->getAllParent('order', CATEGORY_PRODUCT,$locale_id);
                break;
            case'categorypost':
                $data['categoryItems']= $this->_model->getAllParent('order', CATEGORY_POST,$locale_id);
                break;
        }
        $data['lang'] = $lang;
        return $data;
    }

    public function createNewCategoryItem($request, $type)
    {
        $data = [];
        $seo = new Seo();
        if (!$seo->isSeoParameterEmpty($request)) {
            $seo = Seo::create($request->all());
            $request->request->add(['seo_id' => $seo->id]);
        } else {
            $request->request->add(['seo_id' => null]);
        }
        $parameters = $this->_model->prepareParameters($request, $type);
        switch ($type) {
            case'categoryproduct':
                $translation=Translation::create(['is_active'=>$parameters['is_active'],'type'=>CATEGORY_ITEM_PRODUCT]);
                break;
            case'categorypost':
                $translation=Translation::create(['is_active'=>$parameters['is_active'],'type'=>CATEGORY_ITEM_POST]);
                break;
        }
        $parameters->request->add(['translation_id' => $translation->id]);
        $result = $this->_model->create($parameters->all());
        return $data;
    }

    public function createNewCategoryItemLocale($request, $type)
    {
        $data = [];
        $seo = new Seo();
        if (!$seo->isSeoParameterEmpty($request)) {
            $seo = Seo::create($request->all());
            $request->request->add(['seo_id' => $seo->id]);
        } else {
            $request->request->add(['seo_id' => null]);
        }
        $parameters = $this->_model->prepareParameters($request,$type);
        $parameters->request->add(['translation_id' => $parameters['translation_id']]);
        $result = $this->_model->create($parameters->all());
//        $attachData = array();
//        foreach ($parameters['list_category_id'] as $key => $item) {
//            $attachData[$item] = array('type' => CATEGORY_POST);
//        }
//        $result->categoryitems(CATEGORY_POST)->attach($attachData);
        return $data;
    }


    public function showEditCategoryItem($id, $type)
    {
        $data['categoryItem'] = $this->find($id);
        switch ($type) {
            case'categoryproduct':
                $data['categoryItems'] = $this->_model->getAllParent('order', CATEGORY_PRODUCT,1);
                break;
            case'categorypost':
                $data['categoryItems'] = $this->_model->getAllParent('order', CATEGORY_POST,1);
                break;
        }
        $translation=$data['categoryItem']->translations()->first();
        $locale = new Locale();
        $locales = $locale->getAll();
        $data['locales'] = $locales;
        $data['translation']=$translation;
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
        $data = [];
        $categoryItem=new CategoryItem();
//        $categoryItems = $this->find($id)->translations()->first();
//        $translationId = $this->where('id',$id)->first(['translation_id']);

        $translationId=$categoryItem->getTranslationId($id);
        $listCategoryItem=$categoryItem->getAllCategoryByTranslationId($translationId);
        //Xoa Tat Ca Bai Viet Lien Quan Den CategoryItem Ca Tieng Anh Va Tieng Viet
        foreach ($listCategoryItem as $key=>$item){
            $posts=$item->posts()->get();
            foreach ($posts as $key2=>$item2){
                Translation::destroy($item2->translation_id);
                $item2->delete();
            }
        }
        //Hoan Tat Xoa Bai Viet
        Translation::destroy($translationId);
        foreach ($listCategoryItem as $key=>$item){
            $item->delete();
        }
//        $translation = $this->find($id)->translations()->first();
//        foreach ($categoryItems as $key => $item) {
//
//            $this->delete($item->id);
//        }
//        $post=new Post();
//        $posts=$post->getAllPost();
//        Translation::destroy($translation->id);
        return $data;
    }




}