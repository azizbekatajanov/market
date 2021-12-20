<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static $mainLanguage='ru';
    public static $languages =[
        'en',
        'ru'
        ];

    public static function getLocale(){
        $uri=Request::path();
        $segmentsURI=explode('/',$uri);
        if(!empty($segmentsURI[0]&& in_array($segmentsURI[0],self::$languages))){
            if($segmentsURI[0] !=self::$mainLanguage){
                return $segmentsURI[0];
            }
        }
         return null;
    }


    public function handle($request, Closure $next)
    {
        $locale=self::getLocale();
        if(!$locale)
        {
          $locale=self::$mainLanguage;
        }
        App::setLocale($locale);
        if (Cookie::get('lang')!=$locale){
        return $next($request);
        }
        return $next($request);
    }
}
