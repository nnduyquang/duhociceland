<?php

namespace App\Repositories\Backend\Post;

interface PostRepositoryInterface
{
    public function getAllPostByTypeOrderById($type);

    public function showCreatePost($locale_id,$type);

    public function showCreateLangPost($translation_id, $locale_id,$type);

    public function showEditPost($id, $locale_id,$type);

    public function createNewPost($request,$type);

    public function createNewPostLocale($request,$type);

    public function updatePost($request, $id,$type);

    public function deletePost($id);
}


