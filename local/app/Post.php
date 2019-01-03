<?phpnamespace App;use Carbon\Carbon;use Illuminate\Database\Eloquent\Model;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Session;class Post extends Model{    protected $fillable = [        'title', 'path', 'description', 'content','locale_id','translation_id', 'image', 'sub_image', 'post_type', 'user_id', 'seo_id'    ];    public function users()    {        return $this->belongsTo('App\User', 'user_id');    }    public function categoryitems($type)    {        return $this->belongsToMany('App\CategoryItem', 'category_many', 'item_id', 'category_id')->withPivot('type')->wherePivot('type',$type)->withTimestamps();    }    public function seos()    {        return $this->belongsTo('App\Seo', 'seo_id');    }    public function locales()    {        return $this->belongsTo('App\Locale', 'locale_id');    }    public function translations()    {        return $this->belongsTo('App\Translation', 'translation_id');    }    public function setImageAttribute($value)    {        if ($value) {            $this->attributes['image'] = substr($value, strpos($value, 'images'), strlen($value) - 1);        } else            $this->attributes['image'] = null;    }    public function getLanguage()    {        $lang = Session::get('website_language');        $locale = new Locale();        $locale_id = $locale->getLocaleIdByShortLang($lang);        return $locale_id;    }    public function prepareParameters($parameters)    {        $parameters->request->add(['path' => '']);        $parameters->request->add(['user_id' => Auth::user()->id]);        if (!$parameters->input('is_active')) {            $parameters->request->add(['is_active' => null]);        }//        if ($parameters->input('image-choose')) {//            $listImage = $parameters->input('image-choose');//            $subImage = '';//            if (count($listImage) != 0) {//                foreach ($listImage as $key => $item) {//                    if(hasHttpOrHttps($item))//                        $subImage = $subImage . substr($item, strpos($item, 'images'), strlen($item) - 1) . ';';//                    else{//                        $subImage=$subImage.$item.';';//                    }//                }//                $parameters->request->add(['sub_image' => substr($subImage, 0, -1)]);//            }//        }//        else{//            $parameters->request->add(['sub_image' => null]);//        }        return $parameters;    }    public function getAllPostByCategory($categoryId){        return CategoryItem::where('id', $categoryId)->first()->posts()->get();    }    public function getAllPostByCategoryHasLimit($categoryId,$take){        return CategoryItem::where('id', $categoryId)->first()->posts()->take($take)->get();    }    public function getPostByCategoryAndPathPost($categoryId,$path){        return CategoryItem::where('id', $categoryId)->first()->posts()->wherePath($path)->first();    }    public function getSinglePostByTranslationId($translationId){        $locale_id = self::getLanguage();        return $this->where('translation_id', $translationId)->where('locale_id', $locale_id)->first();    }    public function findPostOther($categoryId,$id){        return CategoryItem::where('id', $categoryId)->first()->posts()->where('id','!=',$id)->get();    }    public function findPostOtherHasTakeAndSort($categoryId,$id,$take){        return CategoryItem::where('id', $categoryId)->first()->posts()->where('id','!=',$id)->orderBy('id','DESC')->take($take)->get();    }    public function getAllPost(){        return $this->get();    }    public function getPostByPath($path){        $locale_id = self::getLanguage();        return $this->wherePath($path)->first()->translations()->first()->posts()->where('locale_id',$locale_id)->first();    }    public function findPostOtherByPathAndId($path,$id){        $locale_id = self::getLanguage();        return CategoryItem::wherePath($path)->first()->posts()->where('id','!=',$id)->get();    }    public function setDescriptionAttribute($value)    {        if (!IsNullOrEmptyString($value)) {            $this->attributes['description'] = $value;        } else {            $this->attributes['description'] = null;        }    }    public function setPathAttribute($value)    {        if (IsNullOrEmptyString($value))            $this->attributes['path'] = chuyen_chuoi_thanh_path($this->title);    }    public function getCreatedAtAttribute($date)    {        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');    }    protected static function boot()    {        parent::boot();        static::deleting(function ($post) { // before delete() method call this            if (!is_null($post->seo_id))                $post->seos->delete();            $post->categoryitems(CATEGORY_POST)->detach();        });    }}