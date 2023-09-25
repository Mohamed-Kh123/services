<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_data',
        'category_id',
        'is_active',
        'image',
        'price',
    ];

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
        'category_data' => 'json',
    ];

    public $translatable = [
        'name',
        'description',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
