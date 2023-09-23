<?php

namespace Modules\Core\Interfaces;

use Illuminate\Http\Request;

interface BaseInterface
{
    /**
     * get specific resources' columns
     *
     * @param array $cols
     * @return mixed
     * @author Nawa
     */
    public function get($cols = ['*']);

    /**
     * get single resource according to
     * the given id
     *
     * @param $id
     * @return mixed
     * @author Nawa
     */
    public function find($id);

    /**
     * get all resources
     *
     * @return mixed
     * @author Nawa
     */
    public function all();

    /**
     * take $limit no from query
     * this function accepts passing custom query
     * default $query is null
     *
     * @param int $limit
     * @param  $q
     * @return mixed
     * @author Nawa
     */
    public function take($limit = 10, $q = null);

    /**
     * take $limit no from query
     * this function accepts passing custom query
     * default $query is null
     *
     * @param int $limit
     * @param  $q
     * @return mixed
     * @author Nawa
     */
    public function takeWithResource($limit = 10, $q = null);

    /**
     * delete resource according
     * to the given id
     *
     * @param $id
     * @return mixed
     *
     * @author Nawa
     */
    public function delete($id);

    /**
     * create new resource
     *
     * @param Request $request
     * @return mixed
     *
     * @author Nawa
     */
    public function store(Request $request);

    /**
     * update resource
     *
     * @param Request $request
     * @param $id
     * @return mixed
     *
     * @author Nawa
     */
    public function update(Request $request, $id);
}
