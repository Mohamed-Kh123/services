<?php

use App\Enums\ConstantEnum;
use Illuminate\Support\Facades\DB;

if (!function_exists('get')) {
    function get($array, $path, $default = null)
    {
        return \Illuminate\Support\Arr::get($array, $path, $default);
    }
}

if (!function_exists('pluck')) {
    function pluck($array, $key, $default = null)
    {
        return collect($array)->pluck($key)->toArray() ?? $default;
    }
}

if (!function_exists('camelize')) {

    function camelize($input, $separator = '_')
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }
}
if (!function_exists('handleObjectInApi')) {
    function handleObjectInApi($obj)
    {
        return is_string($obj) ? json_decode($obj, true) : $obj;
    }
}

if (!function_exists('panel_status_label')) {
    function panel_status_label($label, $class, $file = 'admin::lang')
    {
        return isset($label, $class) ? [
            'name' => $file ? genrate_translations($label) : $label,
            'value' => [
                'class' => $class,
            ],
        ] : null;
    }
}

if (!function_exists('getLastDatesByDay')) {

    function getLastDatesByDay($day, $format = 'Y-m-d')
    {
        $dates = [];
        $dates[] = \Illuminate\Support\Carbon::today()->format($format);

        for ($i = 1; $i < $day; $i++) {
            $dates[] = \Carbon\Carbon::today()->subDays($i)->format($format);
        }

        return array_reverse($dates);
    }
}

if (!function_exists('multi_line_statistic_chart')) {
    function multi_line_statistic_chart($data, $categories, $args = [])
    {
        return [
            'component' => 'multi-line-statistic-chart',
            'cols' => get($args, 'cols', 12),
            'title' => get($args, 'title'),
            'data' => [
                [
                    'name' => genrate_translations(get($args, 'title')),
                    'stats' => [],
                    'data' => $data,
                    'xaxis' => [
                        'categories' => $categories,
                    ],
                    'yaxis' => [
                        'labels' => [
                            'offsetX' => 0,
                        ],
                    ],
                ],
            ],
            'model' => [
                'text' => 'name',
                'value' => 'value',
                'icon' => 'icon'
            ]
        ];
    }
}
function getLastMonthDates($format = 'F d, Y')
{
    $dates = [];
    for ($i = 1; $i < 30; $i++) {
        $date = \Carbon\Carbon::today()->subDays($i);
        $weekEnd = $date->copy()->endOfWeek();

        if ($date->copy()->toDateString() == $weekEnd->copy()->toDateString()) {
            $dates[] = $date->format($format);
        }
    }
    return array_reverse($dates);

}

function getLast3MonthDates($format = 'F d, Y')
{
    $dates = [];
    for ($i = 0; $i < 3; $i++) {
        $date = \Carbon\Carbon::today()->subMonths($i)->endOfMonth();
        $weekEnd = $date->copy()->endOfWeek();

        if ($date->copy()->toDateString() == $weekEnd->copy()->toDateString()) {
            $dates[] = $date->format($format);
        }
    }
    return array_reverse($dates);
}


function _implode($array)
{
    return $array ? implode(',', $array) : [];
}

function number_formatter($number, $decimal = 2)
{
    return $number ? (double)number_format($number, $decimal, '.', '') : null;
}

if (!function_exists('__DbTransaction')) {
    function __DbTransaction($callback, $onCommit = null, $onRollback = null)
    {
        DB::beginTransaction();
        try {
            $response = $callback();
            DB::commit();
            if ($onCommit)
                return $onCommit($response);
        } catch (\Exception $exception) {
            DB::rollback();
            if ($onRollback)
                $onRollback();
            throw  $exception;
        }
    }
}

if (!function_exists('statistic_chart_data')) {
    function statistic_chart_data($data, $daysCount, $args = [])
    {
        return collect(getLastDatesByDay($daysCount))->map(function ($date) use ($data, $args) {
            $key = get($args, 'key', 'created_at');
            $return_key = get($args, 'return_key');
            return get(collect($data)->firstWhere($key, \Carbon\Carbon::parse($date)->format('Y-m-d H:i:s')), $return_key, 0);
        })->toArray();
    }
}

if (!function_exists('statistic_chart_component')) {
    function statistic_chart_component($collection, $args = [])
    {
        $days = get($args, 'days', 7);

        return [
            'labels' => getLastDatesByDay($days),
            'series' => get($args, 'series', [[
                'name' => trans('admin::lang.' . get($args, 'name', '')),
                'data' => statistic_chart_data($collection, $days, ['return_key' => get($args, 'return_key')])
            ]]),
            'title' => trans('admin::lang.' . get($args, 'title', 'chart')),
            'subtitle' => get($args, 'subtitle', ''),
            "color" => get($args, 'color', '#0398e2'),
            'cols' => get($args, 'cols', 3),
            'currency' => get($args, 'currency', ""),
        ];
    }
}
if (!function_exists('multi_line_chart')) {
    function multi_line_chart($series, $args = [])
    {
        return [
            'series' => $series,
            'categories' => get($args, 'args.categories', getLastDatesByDay(get($args, 'days', 7), 'Y-m-d\TH:i:s.u\Z')),
            'main_title' => get($args, 'title', 'chart'),
            'labels' => [],
            ...$args
        ];
    }
}
function barChartSeries($collection, $args)
{

    return collect(get($args, 'options'))->map(function ($option) use ($collection, $args) {
        return get($collection->firstWhere(get($args, 'key'), $option), get($args, 'return_key'), 0);
    })->toArray();
}

function translated_booking_statues()
{
    $labels = [];
    foreach (ConstantEnum::BOOKINGS_STATUSES as $status)
        $labels[] = trans("admin::lang.$status");
    return $labels;
}
