<?php

namespace Database\Seeders;

use App\Enum\ConstantEnum;
use App\Models\Constant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ConstantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data() as $item) {
            Constant::updateOrCreate(
                array(
                    'key' => $item['key'],
                    'value->key' => Arr::get($item, 'value.key')
                ),
                $item
            );
        }
    }

    public function data()
    {
        return [
            [
                'name' => ['ar' => 'سلايدرات', 'en' => 'Sliders'],
                'key' => ConstantEnum::SECTIONS_TYPES,
                'value' => ['key' => ConstantEnum::SLIDER_SECTION,]
            ],
            [
                'name' => ['ar' => 'مقالات', 'en' => 'Blogs'],
                'key' => ConstantEnum::SECTIONS_TYPES,
                'value' => ['key' => ConstantEnum::BLOG_SECTION,]
            ],
            [
                'name' => ['ar' => 'الفئات', 'en' => 'Categories'],
                'key' => ConstantEnum::SECTIONS_TYPES,
                'value' => ['key' => ConstantEnum::CATEGORY_SECTION,]
            ],
            [
                'name' => ['ar' => 'الخدمات', 'en' => 'Services'],
                'key' => ConstantEnum::SECTIONS_TYPES,
                'value' => ['key' => ConstantEnum::SERVICE_SECTION,]
            ],
        ];
    }
}
