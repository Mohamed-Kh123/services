<?php

namespace App\Models;

use App\Enum\ConstantEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'is_active',
        'image',
        'order_determine_types',
        'counter_fields',
        'min_price',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'counter_fields' => 'array',
    ];

    public $translatable = [
        'name',
        'description',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function constant()
    {
        return $this->belongsTo(Constant::class, 'order_determine_types', 'value->key');
    }

    public function selectGroups()
    {
        return $this->hasMany(SelectGroup::class, 'service_id');
    }

    public function getTotalAttribute()
    {
        return 10;
//        switch ($this->order_determine_types) {
//            case ConstantEnum::SELECT_GROUP:
//                $select_groups = $this->selectGroups()->whereIn('id',pluck(request()->items,'id'))->get();
//                dd($select_groups);
//                return collect(request()->items)->sum(function ($item) use($select_groups) {
//                    return get($select_groups->firstWhere('id',$item['id']),'price') * $item['quantity'];
//                });
//        }
    }

}
