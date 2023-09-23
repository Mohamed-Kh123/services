<?php

namespace Modules\Core\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Core\Repositories\FileRepository;

trait HasFile
{

    public function uploadFile(Request $request)
    {
        return response()->api(SUCCESS_STATUS,
            trans('admin::messages.file_store_successfully', ['attribute' => $this->alertMessage()]),
            (new FileRepository())->upload($request->file('file'))
        );
    }

    public function previewFile(string $arg, string $arg1, ?string $arg2 = null, ?string $arg3 = null)
    {
        $pathArg = [$arg, $arg1, $arg2, $arg3 ?? ''];

        $path = storage_path('app/public/' . implode('/', array_filter($pathArg)));

        $content = file_get_contents($path);
        $type = File::mimeType($path);

        return response($content)
            ->header('Content-Type', $type);
    }

    public function previewFileApi(string $arg, string $arg1, ?string $arg2 = null, ?string $arg3 = null)
    {
        $pathArg = [$arg, $arg1, $arg2, $arg3 ?? ''];

        $path = storage_path('app/public/' . implode('/', array_filter($pathArg)));

//        $content = file_get_contents($path);
        $content = File::json($path);
        $type = File::mimeType($path);

        return response()->json($content)->header('Content-Type', $type);
//            ->header('Content-Type', $type);
    }
}
