<?php

namespace App\Models;

use App\Enum\ConstantEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Http\Resources\SectionResource;
use Modules\Customer\Http\Resources\CategoryResource;
use Modules\Customer\Http\Resources\ServiceResource;
use Modules\Customer\Http\Resources\SliderResource;

class Section extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'type', 'data', 'ordered', 'is_active'];

    public $translatable = [
        'name'
    ];

    protected $casts = [
        'data' => 'array',
        'name' => 'array',
        'type' => 'array',
    ];

    public function getSectionTypeAttribute()
    {
        switch ($this->type) {
            case ConstantEnum::SERVICE_SECTION;
                return ServiceResource::collection(Service::all());
            case ConstantEnum::CATEGORY_SECTION;
                return CategoryResource::collection(Category::all());
            case ConstantEnum::SLIDER_SECTION;
                return SliderResource::collection($this->where('type', '"slider_section"')->get());
        }
    }
}
