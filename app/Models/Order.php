<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id', 'service_data', 'items', 'total', 'customer_id', 'customer_data', 'data'
    ];

    protected $casts = [
        'customer_data' => 'array', 'data' => 'array', 'service_data' => 'array', 'items' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
