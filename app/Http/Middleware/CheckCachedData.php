<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CheckCachedData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*
        * Se cachea el json obtenido de la API de cumlouder, controlando que la API esté online
        */
        Cache::remember('listado_chicas', 15, function () {
            $json = Http::get('https://webcams.cumlouder.com/feed/webcams/online/61/1/');
            if($json->getStatusCode() == 200)
            {
                return json_decode($json->body());
            }
        });

        return $next($request);
    }
}
