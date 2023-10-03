<?php

namespace Permissions\Models;

use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Role extends \Spatie\Permission\Models\Role
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'guard_name'
    ];

    protected $hidden = ['guard_name'];


    public $translatable = [];

    public $imageable = [];

    public function __construct(array $attributes = [])
    {
//        $attributes['guard_name'] = ADMIN_GUARD;

        parent::__construct($attributes);

        $this->guarded[] = $this->primaryKey;
    }

    /**
     * @return array
     * @author WeSSaM
     */
    public function getTranslatable(): array
    {
        return $this->translatable;
    }

    /**
     * @param array $translatable
     * @author WeSSaM
     */
    public function setTranslatable(array $translatable): void
    {
        $this->translatable = $translatable;
    }

    /**
     * @return array
     */
    public function getImageable(): array
    {
        return $this->imageable;
    }

    /**
     * @param array $imageable
     */
    public function setImageable(array $imageable): void
    {
        $this->imageable = $imageable;
    }

    /**
     * filtering scope
     *
     * @param $q
     * @param Request $request
     * @return mixed
     */
    public function scopeSearch($q, Request $request)
    {
        // $q = $this->filterByKey($q, 'name', '%' . $request->name_roles . '%');
        // return $q;
        if ($request->get('technician'))
            return $q->technician();
        if ($request->get('admin'))
            return $q->admin();
    }

    public function scopeCountry($q)
    {
        if (in_array('country_id', $this->getFillable()))
            $q->where('country_id', request()->header('country'));
    }

    public function scopeCity($q)
    {
        if (in_array('city_id', $this->getFillable()))
            $q->where('city_id', request()->header('city'));
    }

    public function scopeDestination($q)
    {
        if (in_array('city_id', $this->getFillable()))
            $q->where('destination_id', request()->header('city'));
    }

    public function scopeActive($q)
    {
        if (in_array('is_active', $this->getFillable()))
            return $q->where('is_active', 1);
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

    public function scopeOrdered($q)
    {
        return $q->orderBy('ordered', 'asc');
    }

    public function scopeTechnician($q)
    {
        return $q->where('guard_name', 'technician-api');
    }
    public function scopeAdmin($q)
    {
        return $q->where('guard_name', ADMIN_GUARD);
    }

}
