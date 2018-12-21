<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Menu extends Model
{

    protected $fillable = [
        'title', 'url', 'target', 'icon_class', 'color', 'parent_id', 'order', 'route', 'parameters'
    ];
    protected $table = 'menus';

    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id')
            ->with('children');
    }

    public function link($absolute = false)
    {
        return $this->prepareLink($absolute, $this->route, $this->parameters, $this->url);
    }

    protected function prepareLink($absolute, $route, $parameters, $url)
    {
        if (is_null($parameters)) {
            $parameters = [];
        }

        if (is_string($parameters)) {
            $parameters = json_decode($parameters, true);
        } elseif (is_array($parameters)) {
            $parameters = $parameters;
        } elseif (is_object($parameters)) {
            $parameters = json_decode(json_encode($parameters), true);
        }

        if (!is_null($route)) {
            if (!Route::has($route)) {
                return '#';
            }

            return route($route, $parameters, $absolute);
        }

        if ($absolute) {
            return url($url);
        }

        return $url;
    }

    public function prepareParameters($parameters)
    {
        switch (array_get($parameters, 'type')) {
            case 'route':
                $parameters['url'] = '';
                if ($parameters['parameters'] == 'null') {
                    $parameters['parameters'] = null;
                }
                break;
            default:
                if(is_null($parameters['url'])){
                    $parameters['url']='';
                }
                $parameters['route'] = null;
                $parameters['parameters'] = '';
                break;
        }

        if (isset($parameters['type'])) {
            unset($parameters['type']);
        }

        return $parameters;
    }

    public function highestOrderMenuItem($parent = null)
    {
        $order = 1;

        $item = $this->where('parent_id', '=', $parent)
            ->orderBy('order', 'DESC')
            ->first();

        if (!is_null($item)) {
            $order = intval($item->order) + 1;
        }

        return $order;
    }

    public function getAllOrderBy($order){
        return $this->orderBy($order)->get();
    }
}
