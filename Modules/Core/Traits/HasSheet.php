<?php

namespace Modules\Core\Traits;

use App\Models\BaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Core\Export\BaseExport;

trait HasSheet
{
    public $callableCollectionMethod = 'serializeForEdit';

    public $excelResource;

    public $sheetTitle;

    /***
     * @param Request $request
     * @return mixed
     */
    public function import(Request $request)
    {
        $request->validate($this->_getRequest()->imoprtingRules(), $this->_getRequest()->imoprtingMessages());
        $model = $this->_getRepository()->insert($request);
        return response()->api(SUCCESS_STATUS, trans('core::messages.fetched_successfully', ['attribute' => $this->alertMessage()]), $model, []);
    }

    public function exportExcel()
    {
        @ini_set('max_execution_time', -1);
        @ini_set('memory_limit', '2048M');
        $resource = strtolower(class_basename($this->model));
        $collection = $this->collectedDataForSheets();
        $filename = $this->saveExcelFile($resource, [
            'collection' => $collection,
            'columns' => $this->columnsForSheets(),
        ]);
        return response()->api(SUCCESS_STATUS, trans('core::messages.excel_exported_successfully'), ['filename' => file_url($filename, true)]);
    }


    public function saveExcelFile(string $partials_path, $args = [])
    {
        $model = get($args, 'model', $this->model ?? BaseModel::class);
        $resource = strtolower(class_basename($model));
        $store_path = handle_store_file_path($partials_path, get($args, 'resource', $resource));
        $class = get($args, 'class');
        $collection = $class && method_exists($class, 'collection') ? $class->collection() : get($args, 'collection');
        $columns = $class && method_exists($class, 'headings') ? $class->headings() : (count(get($args, 'columns',[])) ? get($args, 'columns') : collect(Arr::first($collection))->keys());
        $title = $class && method_exists($class, 'title') ? $class->title() : $resource;
        Excel::store(new BaseExport($collection, $columns, $title , get($args,'translation_file' , 'admin::reports')), "public/$store_path");
        return $store_path;
    }

    public function exportPdf()
    {
        @ini_set("pcre.backtrack_limit", "5000000");
        $resource = strtolower(class_basename($this->model));
        $path_file = save_pdf($this->viewPdf, $resource,
            ['columns' => $this->columnsForSheets()],
            ['mergeData' => ['collection' => $this->collectedDataForSheets(), 'model_name' => strtolower(class_basename($this->model))], 'resource' => $resource]);

        return response()->api(SUCCESS_STATUS, trans('core::messages.excel_exported_successfully'), ['filename' => file_url($path_file, true)]);
    }


    public function exportFile(string $arg, string $arg1, ?string $arg2 = null, ?string $arg3 = null)
    {
        $pathArg = [$arg, $arg1, $arg2, $arg3 ?? ''];
        $tenant = Arr::first($pathArg, function ($arg) {
            return str_contains($arg, 'tenant');
        });

        $index = array_search($tenant, $pathArg);
        if ($index !== false)
            unset($pathArg[$index]);

        $path = 'app/public/' . implode('/', array_filter($pathArg));

        if ($tenant)
            $path = "$tenant/$path";
        return $this->retrieveFile($path);
    }

    public function retrieveFile($path)
    {
        $path = storage_path($path);

        if (!file_exists($path))
            abort(404);

        return response()->download($path);
    }

    public function columnsForSheets(): array
    {
        return [];
    }

    public function collectedDataForSheets()
    {
        $resource = $this->excelResource ?? $this->__getRepository()->getResource();
        if (request()->get('id')) {
            $model = $this->__getRepository()->find(request()->get('id'));
            return (new $resource($model))->{$this->callableCollectionMethod}(request());
        }
        return $resource::Collection($this->__getRepository()->getProcessedQuery()->get())->toArray(request(), $this->callableCollectionMethod);
    }



}
