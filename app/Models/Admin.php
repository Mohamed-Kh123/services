<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Permissions\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends BaseModel implements JWTSubject
{
    use HasFactory, SoftDeletes, HasRoles, HasPermissions;

    protected $fillable = [
        'name', 'email' , 'password', 'is_active'
    ];

    protected $casts = [
      'password' => 'hashed'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function scopeSearch($q, Request $request)
    {
        if ($search = $request->get('name_email_admins'))
            $q->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");

        if ($request->get('email_admins')) {
            $q->where('email', "like", "%$request->email_admins%");
        }
        if ($request->get('email_admins')) {
            $q->where('email', "like", "%$request->email_admins%");
        }
        if ($request->get('role_admins')) {
            $q->whereHas('roles', function ($inner) use ($request) {
                $inner->where('id', $request->role_admins);
            });
        }
        return $q;
    }
}
