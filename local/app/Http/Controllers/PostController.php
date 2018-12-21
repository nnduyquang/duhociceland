<?php

namespace App\Http\Controllers;

use App\Repositories\Backend\Post\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request, $type)
    {
        $posts = $this->postRepository->getAllPostOrderById($type);
        $view = '';
        if ($type == IS_POST) {
            $view = 'backend.admin.post.index';
        } else {
            $view = 'backend.admin.page.index';
        }
        return view($view, compact('posts'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $data = $this->postRepository->showCreatePost($type);
        if ($type == IS_POST) {
            $categoryPost = $data['categoryPost'];
            return view('backend.admin.post.create', compact('roles', 'categoryPost'));
        } else {
            return view('backend.admin.page.create', compact('roles'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
        $posts = $this->postRepository->createNewPost($request, $type);
        if ($type == IS_POST) {
            return redirect()->route('post.index')->with('success', 'Tạo Mới Thành Công Bài Viết');
        } else {
            return redirect()->route('page.index')->with('success', 'Tạo Mới Thành Công Bài Viết');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $type)
    {
//        $post = $this->postRepository->getPostById($id);
        $data = $this->postRepository->showEditPost($id);
        $post = $data['post'];
        if ($type == IS_POST) {
            $categoryPost = $data['categoryPost'];
            return view('backend.admin.post.edit', compact('categoryPost', 'post'));
        } else {
            return view('backend.admin.page.edit', compact('post'));
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $type)
    {
        $posts = $this->postRepository->updateNewPost($request, $id, $type);
        $returnRoute='';
        if($type==IS_POST){
            $returnRoute='post.index';
        }else{
            $returnRoute='page.index';
        }
        return redirect()->route($returnRoute)->with('success', 'Cập Nhật Thành Công Bài Viết');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$type)
    {
        $this->postRepository->deletePost($id);
        $returnRoute='';
        if($type==IS_POST){
            $returnRoute='post.index';
        }else{
            $returnRoute='page.index';
        }
        return redirect()->route($returnRoute)
            ->with('success', 'Đã Xóa Thành Công');
    }
}
