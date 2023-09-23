<?php

namespace Modules\Core\Http\Middleware;

use App\Models\AdminUser;
use App\Models\Tenant;
use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * check if the languages is sent with
         * request, if so change the dashboard language
         * @author Nawa
         *
         */

        $lang = $request->header('language');
        if (isset($lang) && $lang != "null") {
            app()->setLocale($lang);                    // update the language @author Amr
        }
//        $email = $request->email;


//        $allowedOrigins = ['https://mohrkeytest.com', 'http://127.0.0.1:8000'];
//        $response = $next($request);
//        $response ->headers->set('Access-Control-Allow-Origin', 'http://127.0.0.1:8000');
//        $response ->headers->set('X-Frame-Options', 'SAMEORIGIN');
//        $response ->headers->set('X-XSS-Protection', '1; mode=block');
//        $response ->headers->set('X-Content-Type-Options', 'nosniff');
//        $response ->headers->set('Content-Security-Policy', 'default-src \'self\'; script-src \'self\' \'unsafe-inline\'; style-src \'self\' \'unsafe-inline\'');
//
////        if (!in_array($request->header('Origin'), $allowedOrigins)) {
////            throw new \Exception('not_allowed',403);
////        }
//dd($response->headers);


        return $next($request);

    }
}
