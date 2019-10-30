<?php

namespace App\Http\Middleware;

use Closure, Session;

class Localization
{
    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $browserLang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

        if (!in_array($browserLang, $this->languages)) {
            $browserLang = 'en';
        }

        $appLang = $browserLang;

        if (Session::has('lang')) {
            $appLang = Session::get('lang');
        }

        app()->setLocale($appLang);

        return $next($request);
    }
}
