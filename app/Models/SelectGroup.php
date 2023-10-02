<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SelectGroup extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'group_options',
        'service_id'
    ];

    protected $casts = [
        'group_options' => 'array',
        'title'=> 'array',
        'description'=> 'array',
    ];

    public $translatable = [
        'title',
        'description',
    ];

}
