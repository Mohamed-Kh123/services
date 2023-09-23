<?php

namespace Modules\Core\Interfaces;

/**
 * Created by PhpStorm.
 * User: Nawa
 * Date: 05/04/2020
 * Time: 9:46 PM
 */
interface AuthInterface
{

    /**
     * @author Nawa
     * @param $credentials
     * @return mixed
     */
    public function login($credentials);


    /**
     * @author Nawa
     * @param string $auth
     * @return mixed
     */
    public function logout($auth = USER_GUARD);


    /**
     * @author Nawa
     * @param string $auth
     * @return mixed
     */
    public function refresh($auth = USER_GUARD);


    /**
     * @author Nawa
     * @return mixed
     */
    public function guard();
}
