<?php

namespace App\Models;

use App\Enums\ConstantEnum;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Modules\Core\Traits\HasFilters;
use Spatie\Translatable\HasTranslations;

class BaseModel extends Authenticatable
{
    use HasTranslations, HasFilters;

    public $translatable = [];

    public $imageable = [];

    public $columnsForSheets = [];

    /**
     * @return array
     * @author Nawa
     */
    public function getTranslatable(): array
    {
        return $this->translatable;
    }

    /**
     * @param array $translatable
     * @author Nawa
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

    public function scopeActive($q)
    {
        if (in_array('is_active', $this->getFillable()))
            return $q->where('is_active', 1);
    }
    public function scopeNotActive($q)
    {
        if (in_array('is_active', $this->getFillable()))
            return $q->where('is_active', 0);
    }

    public function scopeDateBetween($q, $from, $to, $attribute = 'created_at')
    {
        return isset($from) && $to ? $q->whereDate($attribute, '>=', $from)->whereDate($attribute, '<=', $to) : $q;
    }

    public function scopeOrdered($q)
    {
        return $q->orderBy('ordered', 'asc');
    }

    public function getStatusClassAttribute()
    {
        return match ($this->status) {
            ConstantEnum::TEMPORARY_BOOKING_STATUS => 'secondary',
            ConstantEnum::BOOKING_CANCELED_STATUS => 'danger',
            ConstantEnum::BOOKING_BACK_STATUS => 'warning',
            ConstantEnum::FINAL_BOOKING_STATUS => 'success',
            default => 'primary',
        };
    }

    public function scopeLastWeek($q)
    {
       return $q->whereDate('created_at', '>=', Carbon::now()->subWeek()->toDateString());
    }


}
