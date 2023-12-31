<?php


namespace Modules\Core\Traits;

use League\Flysystem\NotSupportedException;
use Prophecy\Exception\Doubler\ClassNotFoundException;
use Symfony\Component\ErrorHandler\Error\ClassNotFoundError;

trait RepositoryModel
{
    /**
     * initialize repo.'s model
     *
     * @return mixed
     * @author Nawa
     */
    function __getModel()
    {
        if (!$this->model)
            throw new NotSupportedException('Model not supported');
        $model = $this->__getClassPath($this->model);

        request()['resource_path'] = $model;

        $instance = new $this->model;
        if (request()->get('db_connection'))
            $instance->setConnection(request()->get('db_connection'));
        return $instance;
    }


    function __getClassPath($model)
    {
        $classPath = $model;

        if (is_object($model)) {
            $classPath = get_class($model);
        }
        $isExisted = class_exists($classPath);
        if (!$isExisted)
            throw new ClassNotFoundException("Repository's model is supported", $model);
        return $classPath;
    }
}
