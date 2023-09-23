<?php

namespace Modules\Core\Http\Controllers;

use App\Models\Image;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Modules\Core\Exceptions\UploadErrorException;
use Modules\Core\Repositories\FileRepository;
use Modules\Core\Repositories\ImageRepository;
use Illuminate\Support\Facades\Response;
use Stancl\Tenancy\Facades\Tenancy;

class FileController extends Controller
{

    public function getPdfFile($folder, $invoice, $filename)
    {
        if (request()->get('tenant_id')){
            $tenant = Tenant::find(request()->get('tenant_id'));
            Tenancy::initialize($tenant);
        }
        return response()->download(storage_path("app/$folder/$invoice/$filename"));
    }


    public function show($id)
    {


        $path = storage_path('app/public/files/' . $id);
        $type = File::mimeType($path);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => $type,
        ]);

    }

    public function showInFolder($folder, $id)
    {


        $path = storage_path('app/public/' . $folder . '/' . $id);

        $type = File::mimeType($path);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => $type,
        ]);

    }

    public function showInSubFolder($folder, $subFolder, $id)
    {


        $path = storage_path('app/public/' . $folder . '/' . $subFolder . '/' . $id);


        $type = File::mimeType($path);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => $type,
        ]);

    }

    public function fileUpload(Request $request)
    {
        if (!$request->hasFile("file"))
            return response()->api(false, trans('core::messages.file_not_found'), [], [], UPLOADING_ERROR);

        $file = (new FileRepository())->upload($request->file);

        return response()->api(true, trans('core::messages.uploaded_successfully'), $file);

    }

}

