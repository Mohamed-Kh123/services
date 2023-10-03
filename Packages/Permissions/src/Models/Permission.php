<?php

namespace Permissions\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Http\Request;

class Permission extends \Spatie\Permission\Models\Permission
{

    protected $fillable = ['name', 'title', 'guard_name'];
    protected $hidden = ['guard_name'];
    use HasTranslations;

    public $translatable = [];

    public $imageable = [];

    public function __construct(array $attributes = [])
    {
//        $attributes['guard_name'] =   SUPERVISOR_GUARD;

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
        return $q;
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


}
