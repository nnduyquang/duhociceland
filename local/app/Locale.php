<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = [
        'icon', 'name','short','sort'
    ];
    public function prepareParameters($parameters){
        return $parameters;
    }
    public function setIconAttribute($value)
    {
        if ($value) {
            $this->attributes['icon'] = substr($value, strpos($value, 'image'), strlen($value) - 1);
        } else
            $this->attributes['icon'] = null;
    }
    public function getAll(){
        return $this->orderBy('sort','ASC')->get();
    }
    public function getLocaleById($id){
        return $this->whereId($id)->first();
    }
    public function getLocaleIdByShortLang($lang){
        return $this->where('short',$lang)->first()->id;
    }
}
