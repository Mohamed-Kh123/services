<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionBlog extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'text', 'image', 'section_id', 'is_active'
    ];


    public $translatable = [
        'title' => 'type',
        'text' => 'type',
    ];

    protected $casts = [
        'text' => 'array',
        'title' => 'array',
    ];

    public $imageable = ['image'];
}
