<?php
/**
 * Created by PhpStorm.
 * User: Nawa
 * Date: 28/05/2020
 * Time: 11:45 PM
 */

namespace Modules\Core\Interfaces;


use Illuminate\Http\Request;

interface ModelInterface
{

    /**
     * @author Nawa
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);


    /**
     * @author Nawa
     * @param Request $request
     * @param mixed ...$args
     * @return mixed
     */
    public function update(Request $request, ...$args);


    /**
     * @author Nawa
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @author Nawa
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @author Nawa
     * @param Request $request
     * @return mixed
     */
    public function data(Request $request);

}
