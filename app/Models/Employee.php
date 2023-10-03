<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'is_active',
        'company_id',
        'commission',
    ];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'employee_services', 'employee_id', 'service_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
