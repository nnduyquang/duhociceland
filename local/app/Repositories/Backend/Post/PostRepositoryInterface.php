<?php

namespace App\Repositories\Backend\Post;

interface PostRepositoryInterface
{
    public function getAllPostByTypeOrderById();

    public function showCreatePost($locale_id);

    public function showCreateLangPost($translation_id, $locale_id);

    public function showEditPost($id, $locale_id);

    public function createNewPost($request);

    public function createNewPostLocale($request);

    public function updatePost($request, $id);

    public function deletePost($id);
}


