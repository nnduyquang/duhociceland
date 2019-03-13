<?php

namespace App\Repositories\Frontend;


use App\CategoryItem;
use App\Config;
use App\Menu;
use App\Post;

class FrontendRepository implements FrontendRepositoryInterface
{
    public function getFrontend()
    {
        $data=[];
        $category = new CategoryItem();
        $homeTop = $category->getAllPostCategoryByTranslationId(1);
        $homeCategoryIntroduceTitle = $category->getCategoryByTranslationId(5);
        $homePostIntroduceCategory = $category->getAllPostCategoryByTranslationId(5);
        $homeWhyChooseUsCategory = $category->getCategoryByTranslationId(9);
        $homePostWhyChooseUsCategory = $category->getAllPostCategoryByTranslationId(9);
        $homeOurLatestBlogsCategory = $category->getCategoryByTranslationId(19);
        $homePostOurLatestBlogsCategory = $category->getAllPostCategoryByTranslationId(19);
        $homeOurServicesCategory = $category->getCategoryByTranslationId(23);
        $homePostOurServicesCategory = $category->getAllPostCategoryByTranslationId(23);
        foreach ($homeTop as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        foreach ($homePostIntroduceCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        foreach ($homePostWhyChooseUsCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        foreach ($homePostOurLatestBlogsCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        foreach ($homePostOurServicesCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $homeCategoryIntroduceTitle->description = loai_bo_html_tag($homeCategoryIntroduceTitle->description);
        $homeWhyChooseUsCategory->description = loai_bo_html_tag($homeWhyChooseUsCategory->description);
        $homeOurLatestBlogsCategory->description = loai_bo_html_tag($homeOurLatestBlogsCategory->description);
        $homeOurServicesCategory->description = loai_bo_html_tag($homeOurServicesCategory->description);
        $data['homeTop'] = $homeTop;
        $data['homeCategoryIntroduceTitle'] = $homeCategoryIntroduceTitle;
        $data['homePostIntroduceCategory'] = $homePostIntroduceCategory;
        $data['homeWhyChooseUsCategory'] = $homeWhyChooseUsCategory;
        $data['homePostWhyChooseUsCategory'] = $homePostWhyChooseUsCategory;
        $data['homeOurLatestBlogsCategory'] = $homeOurLatestBlogsCategory;
        $data['homePostOurLatestBlogsCategory'] = $homePostOurLatestBlogsCategory;
        $data['homeOurServicesCategory'] = $homeOurServicesCategory;
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        return $data;
    }

    public function getContact()
    {
        $data = [];
        $category = new CategoryItem();
        $homeOurLatestBlogsCategory = $category->getCategoryByTranslationId(19);
        $homePostOurLatestBlogsCategory = $category->getAllPostCategoryByTranslationId(19);
        foreach ($homePostOurLatestBlogsCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $homeOurLatestBlogsCategory->description = loai_bo_html_tag($homeOurLatestBlogsCategory->description);
        $data['homeOurLatestBlogsCategory'] = $homeOurLatestBlogsCategory;
        $data['homePostOurLatestBlogsCategory'] = $homePostOurLatestBlogsCategory;
        return $data;
    }

    public function getAboutUs()
    {
        $data = [];
        $post=new Post();
        $category = new CategoryItem();
        $pageAboutUs=$post->getSinglePostByTranslationId(30);
        $homeOurLatestBlogsCategory = $category->getCategoryByTranslationId(19);
        $homePostOurLatestBlogsCategory = $category->getAllPostCategoryByTranslationId(19);
        $homeOurServicesCategory = $category->getCategoryByTranslationId(23);
        $homePostOurServicesCategory = $category->getAllPostCategoryByTranslationId(23);
        foreach ($homePostOurLatestBlogsCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        foreach ($homePostOurServicesCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $homeOurLatestBlogsCategory->description = loai_bo_html_tag($homeOurLatestBlogsCategory->description);
        $homeOurServicesCategory->description = loai_bo_html_tag($homeOurServicesCategory->description);
        $data['homeOurLatestBlogsCategory'] = $homeOurLatestBlogsCategory;
        $data['homePostOurLatestBlogsCategory'] = $homePostOurLatestBlogsCategory;
        $data['homeOurServicesCategory'] = $homeOurServicesCategory;
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        $data['pageAboutUs']=$pageAboutUs;
        return $data;
    }

    public function getBlogs()
    {
        $data = [];
        $category = new CategoryItem();
        $homeOurServicesCategory = $category->getCategoryByTranslationId(23);
        $homePostOurServicesCategory = $category->getAllPostCategoryByTranslationId(23);
        $homeOurLatestBlogsCategory = $category->getCategoryByTranslationId(19);
        $homePostOurLatestBlogsCategory = $category->getAllPostCategoryByTranslationId(19);
        foreach ($homePostOurServicesCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        foreach ($homePostOurLatestBlogsCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $homeOurServicesCategory->description = loai_bo_html_tag($homeOurServicesCategory->description);
        $homeOurLatestBlogsCategory->description = loai_bo_html_tag($homeOurLatestBlogsCategory->description);
        $data['homeOurServicesCategory'] = $homeOurServicesCategory;
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        $data['homeOurLatestBlogsCategory'] = $homeOurLatestBlogsCategory;
        $data['homePostOurLatestBlogsCategory'] = $homePostOurLatestBlogsCategory;
        return $data;
    }

    public function getBlogDetail($path)
    {
        $data = [];
        $category = new CategoryItem();
        $post=new Post();
        $homeOurServicesCategory = $category->getCategoryByTranslationId(23);
        $homePostOurServicesCategory = $category->getAllPostCategoryByTranslationId(23);
        foreach ($homePostOurServicesCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $homeOurServicesCategory->description = loai_bo_html_tag($homeOurServicesCategory->description);
        $postBlog=$post->getPostByPath($path);
        $data['homeOurServicesCategory'] = $homeOurServicesCategory;
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        $data['postBlog']=$postBlog;
        return $data;
    }


    public function getServices()
    {
        $data = [];
        $category = new CategoryItem();
        $homeOurLatestBlogsCategory = $category->getCategoryByTranslationId(19);
        $homePostOurLatestBlogsCategory = $category->getAllPostCategoryByTranslationId(19);
        $homeOurServicesCategory = $category->getCategoryByTranslationId(23);
        $homePostOurServicesCategory = $category->getAllPostCategoryByTranslationId(23);
        foreach ($homePostOurLatestBlogsCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        foreach ($homePostOurServicesCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $homeOurLatestBlogsCategory->description = loai_bo_html_tag($homeOurLatestBlogsCategory->description);
        $homeOurServicesCategory->description = loai_bo_html_tag($homeOurServicesCategory->description);
        $data['homeOurLatestBlogsCategory'] = $homeOurLatestBlogsCategory;
        $data['homePostOurLatestBlogsCategory'] = $homePostOurLatestBlogsCategory;
        $data['homeOurServicesCategory'] = $homeOurServicesCategory;
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        return $data;
    }

    public function getServicesDetail($path)
    {
        $data = [];
        $category = new CategoryItem();
        $post=new Post();
        $homeOurLatestBlogsCategory = $category->getCategoryByTranslationId(19);
        $homePostOurLatestBlogsCategory = $category->getAllPostCategoryByTranslationId(19);
        $homeOurLatestBlogsCategory->description = loai_bo_html_tag($homeOurLatestBlogsCategory->description);
        $postServise=$post->getPostByPath($path);
        foreach ($homePostOurLatestBlogsCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $data['homeOurLatestBlogsCategory'] = $homeOurLatestBlogsCategory;
        $data['homePostOurLatestBlogsCategory'] = $homePostOurLatestBlogsCategory;
        $data['postServise']=$postServise;
        return $data;
    }


    public function getFrontendCommon()
    {
        $data = [];
        $category = new CategoryItem();
        $homePostOurServicesCategory = $category->getAllPostCategoryByTranslationId(23);
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        $config = new Config();
        $dataConfig = $config->getConfigByListName(['config-company-name','config-phone','config-phone-1','config-phone-2','config-contact', 'config-email', 'config-contact', 'logo-config','script-js-header','script-js-body','contact-image-config','order-image-config','map-config','config-seo-title','config-seo-description','config-seo-image','slider-config']);
        foreach ($dataConfig as $key => $item) {
            if ($item->name == 'config-company-name')
                $data['config-company-name'] = $item->content;
            if ($item->name == 'config-phone')
                $data['hotline'] = $item->content;
            if ($item->name == 'config-phone-1')
                $data['config-phone-1'] = $item->content;
            if ($item->name == 'config-phone-2')
                $data['config-phone-2'] = $item->content;
            if ($item->name == 'config-email')
                $data['email'] = $item->content;
            if ($item->name == 'config-contact')
                $data['address'] = $item->content;
            if ($item->name == 'config-contact')
                $data['contact'] = $item->content;
            if ($item->name == 'script-js-header')
                $data['script-js-header'] = $item->content;
            if ($item->name == 'script-js-body')
                $data['script-js-body'] = $item->content;
            if ($item->name == 'config-seo-title')
                $data['config-seo-title'] = $item->content;
            if ($item->name == 'config-seo-description')
                $data['config-seo-description'] = $item->content;
            if ($item->name == 'config-seo-image')
                $data['config-seo-image'] = $item->content;
            if ($item->name == 'slider-config')
                $data['slider-config'] = $item->content;
        }
        return $data;
    }

    public function getAllMenuFrontend()
    {
        $menu = new Menu();
        $data = $menu->getAllOrderBy('order');
        return $data;
    }


}