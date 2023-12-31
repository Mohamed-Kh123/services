<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'display_name',
        'file_name',
        'extension',
        'size'
    ];

}
