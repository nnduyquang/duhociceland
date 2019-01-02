<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'is_active', 'type'
    ];
    public function posts()
    {
        return $this->hasMany('App\Post', 'translation_id');
    }
    public function facilities()
    {
        return $this->hasMany('App\Facility', 'translation_id');
    }
    public function units()
    {
        return $this->hasMany('App\Unit', 'translation_id');
    }
    public function locations()
    {
        return $this->hasMany('App\Location', 'translation_id');
    }
    public function products()
    {
        return $this->hasMany('App\Product', 'translation_id');
    }
    public function categoryitems()
    {
        return $this->hasMany('App\CategoryItem', 'translation_id');
    }
    public function setIsActiveAttribute($value)
    {
        if (!IsNullOrEmptyString($value)) {
            $this->attributes['is_active'] = 1;
        } else {
            $this->attributes['is_active'] = 0;
        }
    }
    public function prepareParameters($parameters){
        if (!$parameters->input('is_active')) {
            $parameters->request->add(['is_active' => null]);
        }
    }
    public function getAllTranslation($type){
        return $this->whereType($type)->get();
    }
    public function deleteTranslation($id){
        return $this->delete($id);
    }
}
