<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Exceptions\UploadErrorException;
use Modules\Core\Http\Controllers\BaseController;
use Modules\Core\Http\Resources\AttachmentResource;
use Modules\Core\Repositories\ImageRepository;

class ImageController extends BaseController
{

    public function __construct(protected ImageRepository $imageRepository)
    {
        parent::__construct();
    }

    public function upload(Request $request)
    {
        if (!$request->hasFile('file'))
            throw  new UploadErrorException(trans('lang.file_not_found'));

        $file = $this->imageRepository->upload($request->file('file'),true);
        return response()->api(SUCCESS_RESPONSE, trans('lang.uploaded_successfully'), new AttachmentResource($file));
    }

}
