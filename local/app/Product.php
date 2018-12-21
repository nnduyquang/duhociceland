<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $fillable = [
        'id','name','path','description','content','code' ,'image','sub_image','is_active','price','sale','final_price','is_in_stock','user_id','seo_id','created_at','updated_at'
    ];
    protected $hidden = ['id'];
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function categoryitems($type)
    {
        return $this->belongsToMany('App\CategoryItem', 'category_many', 'item_id', 'category_id')->withPivot('type')->wherePivot('type', $type)->withTimestamps();
    }
    public function seos(){
        return $this->belongsTo('App\Seo','seo_id');
    }
    public function locations()
    {
        return $this->belongsToMany('App\Location', 'location_album', 'product_id', 'location_id')->withTimestamps();
    }
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_product', 'product_id', 'post_id')->withTimestamps();
    }
    public function getAllProductActiveOrderById(){
        return $this->where('is_active',ACTIVE)->orderBy('id','DESC')->get();
    }
    public function prepareParameters($parameters)
    {
        $parameters->request->add(['path' => '']);
        $parameters->request->add(['user_id' => Auth::user()->id]);
        if (!$parameters->input('list_category_id')) {
            $parameters->request->add(['list_category_id' => [1]]);
        }
        if (!$parameters->input('is_active')) {
            $parameters->request->add(['is_active' => null]);
        }

        if (!$parameters->input('is_in_stock')) {
            $parameters->request->add(['is_in_stock' => null]);
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
    public function setIsActiveAttribute($value)
    {
        if (!IsNullOrEmptyString($value)) {
            $this->attributes['is_active'] = 1;
        } else {
            $this->attributes['is_active'] = 0;
        }
    }
    public function setIsInStockAttribute($value)
    {
        if (!IsNullOrEmptyString($value)) {
            $this->attributes['is_in_stock'] = 1;
        } else {
            $this->attributes['is_in_stock'] = 0;
        }
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $this->attributes['image'] = substr($value, strpos($value, 'images'), strlen($value) - 1);
        } else
            $this->attributes['image'] = null;
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

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) { // before delete() method call this
            if (!is_null($product->seo_id))
                $product->seos->delete();
            $product->categoryitems(CATEGORY_PRODUCT)->detach();
            $product->facilities()->detach();
        });

    }
}
