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
        $data = $this->postRepository->getAllPostByTypeOrderById($type);
        $posts = $data['posts'];
        $locales = $data['locales'];
        $view = '';
        if ($type == IS_POST) {
            $view = 'backend.admin.post.index';
        } else {
            $view = 'backend.admin.page.index';
        }
        return view($view, compact('posts', 'locales'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale_id, $type)
    {
        $data = $this->postRepository->showCreatePost($locale_id, $type);
        $locales = $data['locales'];
        if ($type == IS_POST) {
            $categoryPost = $data['categoryPost'];

            return view('backend.admin.post.create', compact('roles', 'categoryPost', 'locales', 'locale_id'));
        } else {
            return view('backend.admin.page.create', compact('roles', 'locales', 'locale_id'));
        }
    }

    public function createLocale($translation_id, $locale_id, $type)
    {
        $data = $this->postRepository->showCreateLangPost($translation_id, $locale_id, $type);
        $langLocale = $data['lang'];
        if ($type == IS_POST) {
            $categoryPost = $data['categoryPost'];
            return view('backend.admin.post.create', compact('roles', 'categoryPost', 'langLocale', 'translation_id', 'locale_id'));
        } else {
            return view('backend.admin.page.create', compact('roles', 'langLocale', 'translation_id', 'locale_id'));
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
        $data = $this->postRepository->createNewPost($request, $type);
        if ($type == IS_POST) {
            return redirect()->route('post.index');
        } else {
            return redirect()->route('page.index');
        }
    }

    public function storeLocale(Request $request,$type)
    {
        $data = $this->postRepository->createNewPostLocale($request,$type);
        if ($type == IS_POST) {
            return redirect()->route('post.index');
        } else {
            return redirect()->route('page.index');
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
    public function edit($id, $locale_id,$type)
    {
        $data = $this->postRepository->showEditPost($id, $locale_id,$type);
        $locales = $data['locales'];
        $translation = $data['translation'];
        $post = $data['post'];
        if ($type == IS_POST) {
            $categoryPost = $data['categoryPost'];
            return view('backend.admin.post.edit', compact('categoryPost', 'post', 'locales', 'translation'));
        }else{
            return view('backend.admin.page.edit', compact( 'post', 'locales', 'translation'));
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$type)
    {
        $data = $this->postRepository->updatePost($request, $id,$type);
        if($type==IS_POST){
            $returnRoute='post.index';
        }else{
            $returnRoute='page.index';
        }
        return redirect()->route($returnRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$type)
    {
        $data = $this->postRepository->deletePost($id);
        $returnRoute='';
        if($type==IS_POST){
            $returnRoute='post.index';
        }else{
            $returnRoute='page.index';
        }
        return redirect()->route($returnRoute);
    }
}
