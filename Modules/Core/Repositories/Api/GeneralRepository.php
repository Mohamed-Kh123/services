<?php


namespace Modules\Core\Repositories\Api;


use App\LocationData;
use App\Locations;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasFilters;
use Modules\Core\Traits\RepositoryModel;

class GeneralRepository
{
    /**
     * it contains all filter's
     * operations
     * @author Nawa
     */
    use RepositoryModel, HasFilters;
    /**
     * repo.'s  model
     * @author Nawa
     * @var Model
     */
    public $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     * @author Nawa
     */
    public function __construct($model = null)
    {
//        if (!$model && class_exists($this->model))
//            $model = new $this->model;
//        $this->model = $model;
    }


}
