<?php

namespace App\Repositories\Frontend;


use App\CategoryItem;
use App\Menu;

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
        $data['homeOurLatestBlogsCategory'] = $homeOurLatestBlogsCategory;
        $data['homePostOurLatestBlogsCategory'] = $homePostOurLatestBlogsCategory;
        $data['homeOurServicesCategory'] = $homeOurServicesCategory;
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        return $data;
    }

    public function getBlogs()
    {
        $data = [];
        $category = new CategoryItem();
        $homeOurServicesCategory = $category->getCategoryByTranslationId(23);
        $homePostOurServicesCategory = $category->getAllPostCategoryByTranslationId(23);
        foreach ($homePostOurServicesCategory as $key => $item) {
            $item->description = loai_bo_html_tag($item->description);
        }
        $homeOurServicesCategory->description = loai_bo_html_tag($homeOurServicesCategory->description);
        $data['homeOurServicesCategory'] = $homeOurServicesCategory;
        $data['homePostOurServicesCategory'] = $homePostOurServicesCategory;
        return $data;
    }

    public function getServices()
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