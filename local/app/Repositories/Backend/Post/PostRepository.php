<?php

namespace App\Repositories\Backend\Post;

use App\CategoryItem;
use App\Product;
use App\Repositories\EloquentRepository;
use App\Seo;
use Illuminate\Support\Facades\Auth;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return \App\Post::class;
    }

    public function getAllPostOrderById($type)
    {
        return $this->_model::where('post_type', '=', $type)->orderBy('id', 'DESC')->get();
    }

    public function showCreatePost($type)
    {
        $data = [];
        if ($type == IS_POST) {
            $categoryItem = new CategoryItem();
            $categoryPost = $categoryItem->getAllParent('order', CATEGORY_POST);
            $data['categoryPost'] = $categoryPost;
        }
        return $data;
    }

    public function showEditPost($id)
    {
        $data = [];
        $data['post'] = $this->find($id);
        $categoryItem = new CategoryItem();
        $categoryPost = $categoryItem->getAllParent('order', CATEGORY_POST);
        $data['categoryPost'] = $categoryPost;
        return $data;
    }


    public function createNewPost($request, $type)
    {
        $seo = new Seo();
        if (!$seo->isSeoParameterEmpty($request)) {
            $seo = Seo::create($request->all());
            $request->request->add(['seo_id' => $seo->id]);
        } else {
            $request->request->add(['seo_id' => null]);
        }
        $parameters = $this->_model->prepareParameters($request);
        $result = $this->_model->create($parameters->all());
        if ($type == IS_POST) {
            $attachData = array();
            foreach ($parameters['list_category_id'] as $key => $item) {
                $attachData[$item] = array('type' => CATEGORY_POST);
            }
            $result->categoryitems(CATEGORY_POST)->attach($attachData);
        }
        return true;
    }

    public function updateNewPost($request, $id, $type)
    {
        $parameters = $this->_model->prepareParameters($request);
        $result = $this->update($id, $parameters->all());
        $seo = new Seo();
        if (!$seo->isSeoParameterEmpty($request)) {
            if (is_null($result->seo_id)) {
                $data = Seo::create($request->all());
                $result->update(['seo_id' => $data->id]);
            } else {
                $result->seos->update($parameters->all());
            }
        } else {
            if (!is_null($result->seo_id)) {
                $result->seos->delete();
            }
        }
        if ($type == IS_POST) {
            $syncData = array();
            foreach ($parameters['list_category_id'] as $key => $item) {
                $syncData[$item] = array('type' => CATEGORY_POST);
            }
            $result->categoryitems(CATEGORY_POST)->sync($syncData);
        }
        return true;
    }

    public function deletePost($id)
    {
        $this->delete($id);
        return true;
    }


}