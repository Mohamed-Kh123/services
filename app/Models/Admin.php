<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'email' , 'password'
    ];

    protected $casts = [
      'password' => 'hashed'
    ];
}
