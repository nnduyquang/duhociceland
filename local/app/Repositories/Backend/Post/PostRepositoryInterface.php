<?php

namespace App\Repositories\Backend\Post;

interface PostRepositoryInterface
{
    public function getAllPostOrderById($type);

    public function showCreatePost($type);

    public function showEditPost($id);

    public function createNewPost($request,$type);

    public function updateNewPost($request, $id,$type);

    public function deletePost($id);
}


