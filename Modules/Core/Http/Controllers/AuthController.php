<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Events\UserAuthentication;
use Modules\Core\Http\Resources\AuthResource;
use Modules\Core\Repositories\Api\AuthRepository;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends BaseController
{

    public $authRepository;
    public $guard = USER_GUARD;
    public $model = User::class;
    public $resource = AuthResource::class;

    /**
     * @param AuthRepository $authRepository
     * @author Nawa
     * AuthController constructor.
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
        $this->authRepository->setGuard($this->guard);
        $this->authRepository->setModelPath($this->model);
    }


    /**
     * @param Request $request
     * @return mixed
     * @throws \Modules\Core\Exceptions\AuthenticationException
     * @author Nawa
     */
    public function login(Request $request)
    {
//      dd(Admin::all());
        $token = $this->authRepository->login($this->credentials($request));
        if (!$token)
            return $this->unauthenticated();
        else
            $this->authenticated($token);

        return response()->api(SUCCESS_RESPONSE, trans('core::messages.successfully_logged_in'), [
            'access_token' => $token,
            'expires_in' => $this->guard()->factory()->getTTL() * 60 * 60,
            'token_type' => 'Bearer',
            'auth' => (new $this->resource(auth($this->guard)->user()))->serializeForEdit($request),
        ]);
    }

    /**
     * @param Request $request
     * @return array
     * @author Nawa
     */
    public function credentials(Request $request)
    {
        return array($this->username() => $request->get($this->username()), 'password' => $request->get('password') ?? '');
    }


    /**
     * @return string
     * @author Nawa
     */
    public function username()
    {
        return 'email';
    }

    /**
     * @param string $auth
     * @return mixed
     * @throws \Modules\Core\Exceptions\AuthenticationException
     */
//    public function logout()
//    {
//        if (auth($this->guard)->check()) {
//            $user = auth($this->guard)->user();
//            auth($this->guard)->logout();
//        }
//        event(new UserAuthentication(LOGOUT_TRANSACTION, $user ?? null));                       // register user's logout transaction @author Nawa
//        return response()->api(SUCCESS_RESPONSE, trans('Auth::lang.logged_out_successfully'));
//    }

    public function logout(Request $request)
    {
        try {
            $user = userAuth();
            // Attempt to invalidate the token
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->api(SUCCESS_RESPONSE, trans('Auth::lang.logged_out_successfully'), $user);
        } catch (JWTException $e) {
            // Something went wrong while invalidating the token
            return response()->api(ERROR_RESPONSE, $e->getMessage());
        }
    }

    /**
     * @param string $auth
     * @throws \Modules\Core\Exceptions\AuthenticationException
     */
    public function refresh($auth = 'api')
    {
        $data = null;
        $token = null;
        if (auth($auth)->check()) {
            $token = auth($auth)->refresh();
        } elseif (auth(ADMIN_GUARD)->check()) {
            $token = auth($auth)->refresh();
        } elseif (auth(USER_GUARD)->check()) {
            $token = auth($auth)->refresh();
        }
        if (is_null($data))
            return response()->api(ERROR_RESPONSE, trans('Auth::lang.token_refreshed_error'));
        event(new UserAuthentication(3));                       // register user's logout transaction @author Nawa
        return $this->authenticated($token);
    }

    /**
     * @param $token
     * @author Nawa
     */
    protected function authenticated($token)
    {

    }

    /**
     * call on unauthenticated
     */
    protected function unauthenticated($message = 'user_not_found')
    {
        return response()->api(false, trans("core::messages.$message"), null, null);
    }

    /**
     * @return mixed
     * @author Nawa
     */
    public function guard()
    {
        return Auth::guard($this->authRepository->getGuard());
    }

}
