<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'has_commission',
        'commission',
        'is_active',
    ];
}
