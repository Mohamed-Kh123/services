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

    public function sliders()
    {
        return $this->belongsToMany(Image::class, 'section_images', 'section_id', 'image_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'section_services', 'section_id', 'service_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'section_categories', 'section_id', 'category_id');
    }

    public function getSectionDataAttribute()
    {
        dd($this->type);
        switch ($this->type) {
            case ConstantEnum::SECTION_SERVICES;
                return ServiceResource::collection($this->services);
            case ConstantEnum::SECTION_CATEGORIES;
                return CategoryResource::collection($this->categories);
            case ConstantEnum::SECTION_SLIDERS;
                return SliderResource::collection($this->sliders);
        }
    }
}
