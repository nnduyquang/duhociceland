<?php

namespace App\Repositories\Backend\Post;

use App\CategoryItem;
use App\Locale;
use App\Repositories\EloquentRepository;
use App\Seo;
use App\Translation;
use Illuminate\Support\Facades\Auth;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return \App\Post::class;
    }

    public function getAllPostByTypeOrderById($type)
    {
        $data = [];
        $locale = new Locale();
        $locales = $locale->getAll();
        $translation = new Translation();
        if ($type == IS_POST)
            $translations = $translation->getAllTranslation(CATEGORY_POST);
        else
            $translations = $translation->getAllTranslation(CATEGORY_PAGE);
        $posts = array();
        foreach ($translations as $key => $item) {
            array_push($posts, $item);
        }

        $data['posts'] = $posts;
        $data['locales'] = $locales;
        return $data;
    }

    public function showCreatePost($locale_id, $type)
    {

        $data = [];
        $locale = new Locale();
        $locales = $locale->getAll();
        if ($type == IS_POST) {
            $categoryItem = new CategoryItem();

            $categoryPost = $categoryItem->getAllParent('order', CATEGORY_POST, $locale_id);

            $data['categoryPost'] = $categoryPost;
        }
        $data['locales'] = $locales;
        return $data;
    }

    public function showCreateLangPost($translation_id, $locale_id, $type)
    {
        $data = [];
        $locale = new Locale();
        if ($type == IS_POST) {
            $categoryItem = new CategoryItem();
            $categoryPost = $categoryItem->getAllParent('order', CATEGORY_POST, $locale_id);
            $data['categoryPost'] = $categoryPost;
        }
        $lang = $locale->getLocaleById($locale_id);
        $data['lang'] = $lang;
        return $data;
    }


    public function showEditPost($id, $locale_id,$type)
    {
        $data = [];
        $data['post'] = $this->find($id);
        $translation = $data['post']->translations()->first();
        $locale = new Locale();
        $locales = $locale->getAll();
        if ($type == IS_POST) {
            $categoryItem = new CategoryItem();
            $categoryPost = $categoryItem->getAllParent('order', CATEGORY_POST, $locale_id);
            $data['categoryPost'] = $categoryPost;
        }
        $data['locales'] = $locales;
        $data['translation'] = $translation;
        return $data;
    }


    public function createNewPost($request, $type)
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
        if ($type == IS_POST) {
            $translation = Translation::create(['is_active' => $parameters['is_active'], 'type' => CATEGORY_POST]);
        } else {
            $translation = Translation::create(['is_active' => $parameters['is_active'], 'type' => CATEGORY_PAGE]);
        }
        $parameters->request->add(['translation_id' => $translation->id]);
        $result = $this->_model->create($parameters->all());
        if ($type == IS_POST) {
            $attachData = array();
            foreach ($parameters['list_category_id'] as $key => $item) {
                $attachData[$item] = array('type' => CATEGORY_POST);
            }
            $result->categoryitems(CATEGORY_POST)->attach($attachData);
        }
        return $data;
    }

    public function createNewPostLocale($request, $type)
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
        $parameters->request->add(['translation_id' => $parameters['translation_id']]);
        $result = $this->_model->create($parameters->all());
        if ($type == IS_POST) {
            $attachData = array();
            foreach ($parameters['list_category_id'] as $key => $item) {
                $attachData[$item] = array('type' => CATEGORY_POST);
            }
            $result->categoryitems(CATEGORY_POST)->attach($attachData);
        }
        return $data;
    }


    public function updatePost($request, $id,$type)
    {
        $data = [];
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
        return $data;
    }

    public function deletePost($id)
    {
        $data = [];
        $posts = $this->find($id)->translations()->first()->posts()->get();
        $translation = $this->find($id)->translations()->first();
        foreach ($posts as $key => $item) {
            $this->delete($item->id);
        }
        Translation::destroy($translation->id);
        return $data;
    }


}