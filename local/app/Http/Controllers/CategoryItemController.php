<?php

namespace App\Http\Controllers;

use App\Repositories\Backend\CategoryItem\CategoryItemRepositoryInterface;
use Illuminate\Http\Request;

class CategoryItemController extends Controller
{
    protected $categoryItemRepository;

    public function __construct(CategoryItemRepositoryInterface $categoryItemRepository)
    {
        $this->categoryItemRepository = $categoryItemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type)
    {
        $data = $this->categoryItemRepository->getAllCategoryItem($type);
        $categoryItems = $data['categoryItems'];
        $locales = $data['locales'];
//        $categoryItems = $this->categoryItemRepository->getAllCategoryItem($type);
        return view('backend.admin.' . $type . '.index', compact('categoryItems','locales'))->with('i', ($request->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $data = $this->categoryItemRepository->showCreateCategoryItem($type);
        $locales=$data['locales'];
        $categoryItems=$data['categoryItems'];
        return view('backend.admin.' . $type . '.create', compact('roles', 'locales','categoryItems'));
    }
    public function createLocale($translation_id, $locale_id,$type)
    {
        $data = $this->categoryItemRepository->showCreateLangCategoryItem($translation_id, $locale_id,$type);
        $categoryItems=$data['categoryItems'];
        $langLocale = $data['lang'];
        return view('backend.admin.' . $type . '.create', compact('roles','categoryItems', 'langLocale', 'translation_id', 'locale_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$type)
    {
        $data = $this->categoryItemRepository->createNewCategoryItem($request,$type);
        return redirect()->route($type.'.index');
    }
    public function storeLocale(Request $request,$type){
        $data = $this->categoryItemRepository->createNewCategoryItemLocale($request,$type);
        return redirect()->route($type.'.index');
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
    public function edit($id,$type)
    {
        $data=$this->categoryItemRepository->showEditCategoryItem($id,$type);
        $categoryItem=$data['categoryItem'];
        $categoryItems=$data['categoryItems'];
        $locales = $data['locales'];
        $translation=$data['translation'];
        return view('backend.admin.'.$type.'.edit', compact('categoryItem','categoryItems','locales','translation'));
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
        $data = $this->categoryItemRepository->updateCategoryItem($request,$id,$type);
        return redirect()->route($type.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$type)
    {
        $this->categoryItemRepository->deleteCategoryItem($id);
        return redirect()->route($type.'.index');
    }
}
