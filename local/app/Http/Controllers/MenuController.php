<?php

namespace App\Http\Controllers;

use App\Repositories\Backend\Menu\MenuRepositoryInterface;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuRepository;

    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index(Request $request)
    {
        $menus = $this->menuRepository->getAllMenuItem();
        return view('backend.admin.menu.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $menu = $this->menuRepository->createNewMenuItem($request);
        return redirect()->route('menu.index');
    }

    public function orderMenu(Request $request){
        $menu = $this->menuRepository->orderMenu($request);
        return redirect()->route('menu.index');
    }

    public function update(Request $request)
    {
        $menu = $this->menuRepository->updateMenuItem($request);
        return redirect()->route('menu.index');
    }

    public function delete($id){
        $menu = $this->menuRepository->deleteMenuItem($id);
        return redirect()->route('menu.index');
    }

}
