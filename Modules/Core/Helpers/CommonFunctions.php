<?php
/**
 * Created by PhpStorm.
 * User: Nawa
 * Date: 24/11/2020
 * Time: 4:34 م
 */

use \Illuminate\Support\Str;

/**
 * return current system languages
 *
 * @return array
 * @author @Nawa
 */
function locales()
{
    return config('languages');
}

if (!function_exists('userAuth')) {


    function userAuth()
    {

        foreach (config('auth.guards') as $guard => $array) {
            if ($array['driver'] == "jwt" && auth($guard)->check())
                return auth($guard)->user();
            continue;
        }
        throw  new \Modules\Core\Exceptions\AuthenticationException;
    }
}
if (!function_exists('checkAuth')) {

    function checkAuth()
    {

        foreach (config('auth.guards') as $guard => $array) {
            if ($array['driver'] == "jwt" && auth($guard)->check())
                return auth($guard)->check();

        }
        return false;
    }
}
/**
 * @return string
 * @author @Nawa
 */
function current_locale()
{
    return \Illuminate\Support\Facades\App::getLocale();
}

function load_resource_pagination($resourceClass, \Illuminate\Pagination\LengthAwarePaginator $paginator)
{
    $data = $paginator->getCollection();
    if ($resourceClass != null) {
        $data = $resourceClass::collection($paginator->getCollection());
    }
    $result['data'] = $data;
    $temp = $paginator->toArray();
    unset($temp['data']);
    $result['paginator'] = $temp;

    return $result;
}

//if (!function_exists('get_resource_name')) {
/**
 * this function returns the name of resource which
 * is the name of object's class
 * all resource name will be returned in lower case¬
 *
 * @param $classPath
 * @return string
 * @author Nawa
 */
function get_resource_name($classPath)
{
    $pathPartials = explode('\\', $classPath);
    return strtolower(end($pathPartials));
}

/**
 * @param $classPath
 * @return mixed
 * @author Nawa
 */
function get_class_name($classPath)
{
    if (is_object($classPath))
        $classPath = get_class($classPath);
    $pathPartials = explode('\\', $classPath);
    return end($pathPartials);
}


/**
 * @param $model
 * @return string
 */
function models_path($model)
{
    return "App\\Models\\$model";
}

function prepare_error_attrs_keys($errors)
{
    $new = [];
    foreach ($errors->getMessages() as $key => $error) {
        $new[(strpos($key, '.') !== false) ? explode('.', $key)[0] : $key] = $error;
    }
    return $new;
}

function flattern($array, $delimiter)
{
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value))
            $result = array_merge($result, flattern($value, $delimiter));
        else
            $result["$key$delimiter$value"] = $value;
    }
    return $result;
}

//}

/**
 *
 * @param $img
 * @param string $size
 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
 * @author Nawa
 */

function image_url($img, $size = '', $isArray = false)
{
    $array = [];
    if($isArray){
        foreach ($img as $im){
            $array[] = (!empty($size)) ? url('image/' . $size . '/' . $im) : url('image/' . $im);
        }
        return $array;
    }
    return (!empty($size)) ? url('image/' . $size . '/' . $img) : url('image/' . $img);
}

if (!function_exists('send_notification_for_models')) {
    /**
     * send notification for models or a single one
     * @param $data
     * @param null $models
     * @author Amr
     */
    function send_notification_for_models($data, $model, $topic, $models = null)
    {
        $topic = \Illuminate\Support\Facades\DB::connection()->getName() === 'tenant' ? tenant()->id . "-$topic" : $topic;
        $_data = collect($data);

        $savingFlag = $_data->get('save', true);
        $data = $_data->except('save')->toArray();

        if (!$models) {

            send_notification($data, 'topic', $topic, function ($response, $_self) use ($model, $savingFlag, $topic, $data) {
                if ($savingFlag)
                    \Firebase\FCM\Models\Notification::create(array_merge($_self->getData(), ['type' => collect($_self->getData())->get('type'), 'payload' => $_self->getData(), 'topic' => $topic]));

            });

        } else if ($models instanceof \Illuminate\Database\Eloquent\Collection) {

            $models->chunk(5)->each(function ($chunk) use ($data, $topic, $savingFlag) {
                $transformedChunks = $chunk->map(function ($model) use ($topic) {
                    return "'$topic-$model->id' in Topics";
                });
                $condition = $transformedChunks->implode(' || ');
                send_notification($data, 'condition', $condition, function ($response, $_self) use ($chunk, $savingFlag) {
                    $chunk->each(function ($model) use ($response, $_self, $savingFlag) {
                        if ($savingFlag === true)
                            $model->notifications()->create(array_merge($_self->getData(), ['type' => collect($_self->getData())->get('type'), 'payload' => $_self->getData()]));
                    });
                });
            });
        } else {

            send_notification($data, 'condition', "'$topic-$models->id' in Topics", function ($response, $_self) use ($models, $savingFlag) {
                if ($savingFlag === true)
                    $models->notifications()->create(array_merge($_self->getData(), ['type' => collect($_self->getData())->get('type'), 'payload' => $_self->getData()]));
            });
        }
    }
}

if (!function_exists('createUniqueFilename')) {
    function createUniqueFilename($extension = "xlsx"): string
    {
        return 'file_' . time() . mt_rand() . '.' . $extension;

    }
}

if (!function_exists('upload_response')) {
    function upload_response($status, $filename = null, $url = null)
    {
        return [
            'id' => $url,
            'name' => $filename,
            'status' => $status,
            'url' => '/' . STORAGE_FILES_PATH_PREFIX . \Illuminate\Support\Str::after($url, 'public/')
        ];
    }
}

if (!function_exists('upload_show_response')) {
    function upload_show_response($file)
    {
        return [
            [
                'id' => $file,
                'name' => basename($file),
                'uid' => $file,
                'status' => true,
                'url' => '/' . Str::replace('public/', STORAGE_FILES_PATH_PREFIX, $file),
            ]
        ];
    }
}

if (!function_exists('handle_store_file_path')) {
    function handle_store_file_path($partialPath, $file_prefix = 'file', $extension = "xlsx")
    {
        return "$partialPath/" . generate_storage_file_name($file_prefix, $extension);
    }
}
if (!function_exists('generate_storage_file_name')) {
    function generate_storage_file_name($prefix, $extension)
    {
        return "{$prefix}_" . time() . mt_rand() . '.' . $extension;
    }
}


if (!function_exists('file_url')) {
    function file_url($file_url, bool $withOutBaseUrl = false, $withPrefix = false)
    {
        if (!$file_url)
            return null;

        if ($withPrefix)
            $file_url = STORAGE_FILES_PATH_PREFIX . $file_url;

        return $withOutBaseUrl ? $file_url : url($file_url);
    }
}

if (!function_exists('preview_file_url')) {
    function preview_file_url($file_url)
    {
        if (!$file_url)
            return null;
        return url(STORAGE_FILES_PATH_PREFIX . 'preview/' . Str::replace('public/','',$file_url));
    }
}

if (!function_exists('preview_file_url_api')) {
    function preview_file_url_api($file_url)
    {
        if (!$file_url)
            return null;
        return url('api/'.STORAGE_FILES_PATH_PREFIX . 'preview/' . Str::replace('public/','',$file_url));
    }
}

if (!function_exists('save_pdf')) {
    function save_pdf(string $view, $path, $data, $config = array())
    {
        try {
            $resource = get($config, 'resource', 'pdf_report');
            $pdf = LaravelMpdf::loadView($view, $data, get($config, 'mergeData', []),
                array_merge([
                    'title' => $resource,
                    'format' => get($config, 'format', 'A4-L'),
                    'orientation' => get($config, 'orientation', 'L')
                ], get($config, 'config', []))
            );
            return store_storage_file($path, $pdf->output(), $resource, 'pdf');
        } catch (Exception $exception) {
            \Illuminate\Support\Facades\Log::error("save_pdf exception" . $exception->getMessage());
        }
    }
}

if (!function_exists('store_storage_file')) {
    function store_storage_file($path, $file, $resource = 'file', $fileExtensionArg = null, $disk = 'public')
    {

        if (!$file || !$path)
            throw new Exception(trans('message.invalid_store_storage_file_params'));

        $fileExtension = \Illuminate\Support\Facades\File::extension($file);
        if (!$fileExtension && !$fileExtensionArg)
            throw new Exception(trans('message.invalid_file'));

        $path = handle_store_file_path($path, $resource, $fileExtensionArg ?? $fileExtension);

        $response = \Illuminate\Support\Facades\Storage::disk($disk)->put($path, $file);

        if (!$response)
            throw new Exception(trans('message.error_while_store_file'));

        return $path;
    }
}

if (!function_exists('double_formater')) {

    function double_formater($number, $precision = 2)
    {
        return (double)number_formatter($number, $precision, '.', '');

    }
}
if (!function_exists('generate_translations')) {
    function generate_translations($key, $attribute = []): array
    {
        if ($key)
            return [
                'ar' => trans('admin::lang.' . $key, $attribute, 'ar'),
                'en' => trans('admin::lang.' . $key, $attribute, 'en'),
            ];
        return [];
    }
}

if (!function_exists('get_currency_code')) {
    function get_currency_code()
    {
        $setting = \App\Models\Setting::where('key', 'currency_symbol')->first();
        return $setting && $setting->value ? $setting->value : "";
    }
}
