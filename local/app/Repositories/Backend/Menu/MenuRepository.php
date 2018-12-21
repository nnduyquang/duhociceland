<?php

namespace App\Repositories\Backend\Menu;

use App\Menu;
use App\Repositories\EloquentRepository;

class MenuRepository extends EloquentRepository implements MenuRepositoryInterface
{
    public function getModel()
    {
        return \App\Menu::class;
    }

    public function createNewMenuItem($request)
    {
        $data = $this->_model->prepareParameters($request);
        $data['order'] = $this->_model->highestOrderMenuItem();
        $result = $this->create($data->all());
        return redirect()->route('menu.index')->with('success', 'Tạo Mới Thành Công Bài Viết');
    }

    public function updateMenuItem($request)
    {
        $id = $request->input('id');
        $data = $this->_model->prepareParameters($request->except(['id']));
        $menuItem = $this->find($id);
        $result = $menuItem->update($data);
        return redirect()->route('menu.index')->with('success', 'Cập Nhật Thành Công Bài Viết');
    }

    public function deleteMenuItem($id)
    {
        $menuItem = $this->find($id);
        $children=$menuItem->children;
        if(!$children->isEmpty()){
            foreach ($children as $key=>$item){
                self::deleteMenuItem($item->id);
            }
        }else{
            $menuItem->delete($id);
        }
        $menuItem->delete($id);
    }


    public function orderMenu($request)
    {
        $menuItemOrder = json_decode($request->data);
        $this->orderItem($menuItemOrder, null);
    }

    public function orderItem(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {

            $item = $this->find($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem->children)) {

                self::orderItem($menuItem->children, $item->id);
            }
        }
    }
    
    public function getAllMenuItem()
    {
        $newArray = array();
        $menu=$this->_model->getAllOrderBy('order');
        foreach ($menu as $key=>$item){
            if(!isset($item->parent_id)){
                array_push($newArray, $item);
            }
        }
        return $newArray;
    }
}