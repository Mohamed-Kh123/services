<?php
/**
 * Created by PhpStorm.
 * User: WeSSaM
 * Date: 27/3/2021
 * Time: 2:23 م
 */

namespace Modules\Core\Repositories;


use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\Core\Interfaces\AttachmentInterface;

class FileRepository
{

    protected string $extension;

    protected string $rootDirectory = '';

    public function upload($attachment, $config = [])
    {
        if (!$attachment->isValid())
            throw new \Exception(trans('core::messages.invalid_file'));

        $extension = $attachment->getClientOriginalExtension();
        $filename = createUniqueFilename($extension);

//        $allowedExtensions = get($config, 'allowedExtensions');
//        if ($allowedExtensions && !in_array($extension, $allowedExtensions))
//            throw new \Exception(trans('core::messages.invalid_extension'));

        if (!$this->rootDirectory)
            $this->rootDirectory = strtolower(basename(request()->get('resource_path', 'base')));

        $response = $attachment->storeAs("public/$this->rootDirectory", $filename);

        if (!$response)
            throw new \Exception(trans('admin::messages.error_when_uploading'));

        if (get($config, 'save'))
            return $this->saveToModel($attachment, $filename, $extension);

        return $this->response($filename);
    }

    public function setRootDirectory(string $directory)
    {
        $this->rootDirectory = $directory;
        return $this;
    }


    protected function response($filename)
    {
        if (request()->is('api/admin/*'))
            return upload_response(SUCCESS_STATUS, $filename, "public/$this->rootDirectory/$filename");

        return $filename;
    }

    public function saveToModel($attachment, $filename, $extension)
    {
        return File::create(array(
            'size' => ($attachment->getSize() / 1024) ?? 0,
            'extension' => $extension,
            'file_url' => "public/$this->rootDirectory/$filename",
            'file_name' => $filename,
            'display_name' => basename($filename)
        ));
    }
}
