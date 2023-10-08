<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'type', 'data', 'ordered', 'is_active'];

    public $translatable = [
        'name'
    ];

    protected $casts = [
        'data' => 'array',
        'name' => 'array',
        'type' => 'array',
    ];

}
