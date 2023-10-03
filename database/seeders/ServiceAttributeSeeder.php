<?php

namespace Database\Seeders;

use App\Enum\ConstantEnum;
use App\Models\Constant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ServiceAttributeSeeder extends Seeder
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
                'name' => ['ar' => 'مجموعات اختيار', 'en' => 'Select group'],
                'key' => ConstantEnum::ORDER_DETERMINE_TYPES,
                'value' => ['key' => ConstantEnum::SELECT_GROUP,]
            ],
            [
                'name' => ['ar' => 'حقل عداد', 'en' => 'Counter field'],
                'key' => ConstantEnum::ORDER_DETERMINE_TYPES,
                'value' => ['key' => ConstantEnum::COUNTER_FIELDS,]
            ],
            [
                'name' => ['ar' => 'يعتمد على معاينة الطلب', 'en' => 'Depends on the order preview'],
                'key' => ConstantEnum::ORDER_DETERMINE_TYPES,
                'value' => ['key' => ConstantEnum::PREVIEW_ORDER,]
            ],
        ];
    }
}
