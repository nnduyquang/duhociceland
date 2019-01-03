<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class CategoryItem extends Model
{
    protected $fillable = [
        'name', 'path', 'description', 'content', 'image', 'image_mobile', 'level', 'parent_id', 'type', 'seo_id', 'locale_id', 'translation_id', 'order', 'is_active'
    ];
    protected $table = 'category_items';
    protected $hidden = ['id'];
    public function seos(){
        return $this->belongsTo('App\Seo','seo_id');
    }
    public function children()
    {
        return $this->hasMany('App\CategoryItem', 'parent_id')
            ->with('children');
    }

    public function translations()
    {
        return $this->belongsTo('App\Translation', 'translation_id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'category_many', 'category_id', 'item_id')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_many', 'category_id', 'item_id')->withTimestamps();
    }

    public function prepareParameters($parameters,$type)
    {
        if (!$parameters->has('is_active'))
            $parameters->request->add(['is_active' => null]);
        $parameters->request->add(['path' => '']);
        $parameters->request->add(['level' => 0]);
        switch ($type) {
            case'categoryproduct':
                $parameters->request->add(['type' => CATEGORY_PRODUCT]);
                break;
            case'categorypost':
                $parameters->request->add(['type' => CATEGORY_POST]);
                break;
        }
        $parent_id = $parameters->input('parent_id');
        if ($parent_id == '-1') {
            $parameters['parent_id'] = null;
            $parameters['level'] = 0;
        }else{
            $parameters['level']=self::findLevelById($parent_id)+1;
        }
        if ($parameters->input('image-choose')) {
            $listImage = $parameters->input('image-choose');
            $subImage = '';
            if (count($listImage) != 0) {
                foreach ($listImage as $key => $item) {
                    if (hasHttpOrHttps($item))
                        $subImage = $subImage . substr($item, strpos($item, 'images'), strlen($item) - 1) . ';';
                    else {
                        $subImage = $subImage . $item . ';';
                    }
                }
                $parameters->request->add(['sub_image' => substr($subImage, 0, -1)]);
            }
        } else {
            $parameters->request->add(['sub_image' => null]);
        }
        return $parameters;
    }

    public function findLevelById($id){
        return $this->where('id',$id)->first()->level;
    }

    public function findCategoryById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getChildCategoryByParentId($parent_id)
    {
        return $this->where('parent_id', $parent_id)->where('is_active', ACTIVE)->get();
    }

    public function getLanguage()
    {
        $lang = Session::get('website_language');
        $locale = new Locale();
        $locale_id = $locale->getLocaleIdByShortLang($lang);
        return $locale_id;
    }

    public function getAllCategoryByType($type)
    {
        $locale_id = self::getLanguage();
        return $this->where('type', $type)->where('locale_id', $locale_id)->orderBy('order')->get();
    }

    public function getAllOrderBy($order, $type, $locale_id)
    {
        return $this->where('type', $type)->where('locale_id', $locale_id)->orderBy($order)->get();
    }

    public function getAllParent($order, $type, $locale_id)
    {
        $newArray = array();
        $categoryItems = self::getAllOrderBy($order, $type, $locale_id);
        foreach ($categoryItems as $key => $item) {
            if (!isset($item->parent_id)) {
                array_push($newArray, $item);
            }
        }
        return $newArray;
    }

    public function getCategoryItemByPath($path)
    {
        $locale_id = self::getLanguage();
        return $this->where('path', $path)->first()->translations()->first()->categoryitems()->where('locale_id', $locale_id)->first();
    }

    public function getCategoryItemById($id)
    {
        $locale_id = self::getLanguage();
        return $this->where('id', $id)->where('locale_id', $locale_id)->first();
    }

    public function getCategoryItemOther($id, $type)
    {
        $locale_id = self::getLanguage();
        return $this->where('id', '!=', $id)->where('type', $type)->where('locale_id', $locale_id)->get();
    }

    public function getAllPostByCategory($path)
    {
        $locale_id = self::getLanguage();
        return $this->wherePath($path)->first()->translations()->first()->categoryitems()->where('locale_id', $locale_id)->first()->posts()->get();
    }

    public function getAllPostCategoryByTranslationId($translationId)
    {
        $locale_id = self::getLanguage();
        return $this->where('translation_id', $translationId)->where('locale_id', $locale_id)->first()->posts()->get();
    }


    public function getCategoryByTranslationId($translationId)
    {
        $locale_id = self::getLanguage();
        return $this->where('translation_id', $translationId)->where('locale_id', $locale_id)->first();
    }

    public function getAllCategoryByTranslationId($translationId)
    {
        return $this->where('translation_id', $translationId)->get();
    }

    public function getTranslationId($id)
    {
        return $this->where('id', $id)->first()->translation_id;
    }
    public function setIsActiveAttribute($value)
    {
        if (!IsNullOrEmptyString($value)) {
            $this->attributes['is_active'] = 1;
        } else {
            $this->attributes['is_active'] = 0;
        }
    }

    public function setPathAttribute($value)
    {
        if (IsNullOrEmptyString($value))
            $this->attributes['path'] = chuyen_chuoi_thanh_path($this->name);
    }

    public function setOrderAttribute($value)
    {
        if (IsNullOrEmptyString($value))
            $this->attributes['order'] = 1;
    }
    public function setImageAttribute($value)
    {
        if ($value) {
            $this->attributes['image'] = substr($value, strpos($value, 'images'), strlen($value) - 1);
        } else
            $this->attributes['image'] = null;
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($categoryItem) { // before delete() method call this
            if (!is_null($categoryItem->seo_id))
                $categoryItem->seos->delete();
        });

    }
}
