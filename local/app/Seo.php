<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
        'id','seo_title','seo_description','seo_keywords','seo_image','created_at','updated_at'
    ];
    public function isSeoParameterEmpty($parameters)
    {
        $seo_keywords = $parameters->input('seo_keywords');
        $seo_title = $parameters->input('seo_title');
        $seo_description = $parameters->input('seo_description');
        $seo_image = $parameters->input('seo_image');
        if(is_null($seo_keywords)&&is_null($seo_title)&&is_null($seo_description)&&is_null($seo_image))
            return true;
        else
            return false;
    }
}
