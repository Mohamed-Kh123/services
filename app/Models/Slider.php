<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image', 'ordered', 'is_active'
    ];

    public $imageable = ['image'];
}
