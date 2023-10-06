<?php

namespace Modules\Core\Repositories\Api;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Modules\Core\Events\UserAuthentication;
use Modules\Core\Exceptions\AuthenticationException;
use Modules\Core\Interfaces\AuthInterface;

/**
 * Created by PhpStorm.
 * User: Nawa
 * Date: 05/04/2020
 * Time: 9:44 PM
 */
class AuthRepository implements AuthInterface
{


    public $modelPath = Customer::class;
    public $guard = USER_GUARD;

    /**
     * @author Nawa
     * @param $credentials
     * @return mixed
     * @throws AuthenticationException
     */
    public function login($credentials)
    {
//        dd($credentials);

        Config::set('jwt.user', $this->modelPath);                        // change jwt user @author Nawa
        Config::set('auth.providers.users.model', $this->modelPath);      // load the user model @author Nawa

        if (!$token = $this->guard()->attempt($credentials))
          return false;
//            throw new AuthenticationException(trans('core::messages.user_not_found'));

//        if ($this->guard()->user() && $this->guard()->user()->status == INACTIVE)
//            throw new AuthenticationException(trans('Auth::lang.user_not_active_found'));
//
//        if ($this->guard()->user() && $this->guard()->user()->status == SUSPENDED)
//            throw new AuthenticationException(trans('Auth::lang.user_suspended'));

        event(new UserAuthentication(LOGIN_TRANSACTION));    // register user's login transaction      @author Nawa

        return $token;
    }

    /**
     * @author Nawa
     * @param string $auth
     * @return mixed
     */
    public function logout($auth = USER_GUARD)
    {
        // TODO: Implement logout() method.
    }

    /**
     * @author Nawa
     * @param string $auth
     * @return mixed
     */
    public function refresh($auth = USER_GUARD)
    {
        // TODO: Implement refresh() method.
    }


    /**
     * @author Nawa
     * @return mixed
     */
    public function guard()
    {
        return Auth::guard($this->getGuard());
    }

    /**
     * @return string
     */
    public function getModelPath(): string
    {
        return $this->modelPath;
    }

    /**
     * @param string $modelPath
     */
    public function setModelPath(string $modelPath): void
    {
        $this->modelPath = $modelPath;
    }

    /**
     * @return string
     */
    public function getGuard(): string
    {
        return $this->guard;
    }

    /**
     * @param string $guard
     */
    public function setGuard(string $guard): void
    {
        $this->guard = $guard;
    }
}
