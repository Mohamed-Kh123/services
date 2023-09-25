<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'image',
    ];

    public $translatable =[
        'name',
        'description',
    ];

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
    ];

}
