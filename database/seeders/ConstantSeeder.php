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
        foreach ($this->paymentMethods() as $item) {
            Constant::updateOrCreate(
                array(
                    'key' => $item['key'],
                    'value->key' => Arr::get($item, 'value.key')
                ),
                $item
            );
        }
    }

    public function sectionTypes()
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
        ];
    }

    public function paymentMethods()
    {
        return [
            [
                'name' => ['ar' => 'تابي', 'en' => 'Tabby'],
                'key' => ConstantEnum::PAYMENT_METHODS,
                'value' => ['key' => ConstantEnum::TABBY,]
            ],
            [
                'name' => ['ar' => 'تمارا', 'en' => 'Tamara'],
                'key' => ConstantEnum::PAYMENT_METHODS,
                'value' => ['key' => ConstantEnum::TAMARA,]
            ],
            [
                'name' => ['ar' => 'سترايب', 'en' => 'Strip'],
                'key' => ConstantEnum::PAYMENT_METHODS,
                'value' => ['key' => ConstantEnum::STRIPE,]
            ],
        ];
    }
}
