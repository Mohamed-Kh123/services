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


}
