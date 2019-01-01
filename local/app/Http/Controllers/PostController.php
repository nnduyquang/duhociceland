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

    public function index(Request $request)
    {
        $data = $this->postRepository->getAllPostByTypeOrderById();
        $posts = $data['posts'];
        $locales = $data['locales'];
        return view('backend.admin.post.index', compact('posts', 'locales'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale_id)
    {
        $data = $this->postRepository->showCreatePost($locale_id);
        $categoryPost = $data['categoryPost'];
        $locales = $data['locales'];
        return view('backend.admin.post.create', compact('roles', 'categoryPost', 'locales','locale_id'));
    }

    public function createLocale($translation_id, $locale_id)
    {
        $data = $this->postRepository->showCreateLangPost($translation_id, $locale_id);
        $categoryPost = $data['categoryPost'];
        $langLocale = $data['lang'];
        return view('backend.admin.post.create', compact('roles', 'categoryPost', 'langLocale', 'translation_id', 'locale_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->postRepository->createNewPost($request);
        return redirect()->route('post.index');
    }
    public function storeLocale(Request $request){
        $data = $this->postRepository->createNewPostLocale($request);
        return redirect()->route('post.index');
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
    public function edit($id,$locale_id)
    {
        $data = $this->postRepository->showEditPost($id,$locale_id);
        $categoryPost = $data['categoryPost'];
        $post = $data['post'];
        $locales = $data['locales'];
        $translation=$data['translation'];
        return view('backend.admin.post.edit', compact('categoryPost', 'post', 'locales','translation'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->postRepository->updatePost($request, $id);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->postRepository->deletePost($id);
        return redirect()->route('post.index');
    }
}
