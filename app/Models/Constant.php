<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class Constant extends BaseModel
{
    protected $fillable = [
        'key',
        'name',
        'value',
        'is_active',
    ];


    public $translatable = [
        'name',
    ];


    protected $casts = [
        'value' => 'array',
        'name' => 'array',
    ];


    /**
     * @param Request $request
     * @param Request $q
     * @return Request|mixed
     */
    public function scopeSearch($q, Request $request)
    {
        if ($request->has('key'))
            $q->where('key', $request->key);

        return $q;
    }

    public function getNameTranslationsAttribute()
    {
        return $this->getTranslations('name');
    }

    public function scopeSearchInJson($q, $attribute, $value)
    {
        $q->where("value->$attribute", $value);
    }


    public static function getValue($key, $value)
    {
        return self::query()->where("key", $key)->where("value->key", $value)->first();
    }

    public static function getValueByValue($key , $with = [])
    {
        $query = self::query()->where("key", $key);
        if ($with)
            $query->with($with);

        return $query->get();
    }

    public static function pluckValueKey($key)
    {
        return self::query()->where("key", $key)->pluck('value')->pluck('key')->toArray();
    }

    public function getColorAttribute()
    {
        return get($this, 'value.color');
    }

    public function getFrameColorAttribute()
    {
        return get($this, 'value.frame_color');
    }

    public function getValueKeyAttribute()
    {
        return get($this, 'value.key');
    }


}
