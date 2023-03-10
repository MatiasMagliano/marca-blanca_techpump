<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        /*
        * El controlador determina el tipo de template en css a aplicar de acuerdo
        * a la configuración presente en config/site-config.php parseando
        */

        $url = parse_url(URL::full(), PHP_URL_HOST);
        $dominio = explode(".", str_replace('www.', '', $url));

        switch($dominio[1])
        {
            case 'babosas':
                $config = [
                    'css-reset' => config('site-config.babosas.css-path') . 'reset.css',
                    'css-estilos' => config('site-config.babosas.css-path') . 'estilos.css',
                ];
                return view('welcome', compact('config'));
            break;

            case 'cerdas':
                $config = [
                    'css-reset' => config('site-config.cerdas.css-path') . 'reset.css',
                    'css-estilos' => config('site-config.cerdas.css-path') . 'estilos.css',
                ];
                return view('welcome', compact('config'));
            break;

            case 'conejox':
                $config = [
                    'css-reset' => config("site-config.conejox.css-path") . 'reset.css',
                    'css-estilos' => config("site-config.conejox.css-path") . 'estilos.css',
                ];
                return view('welcome', compact('config'));
            break;

            default: "URL MAL FORMADA";
            break;
        }
    }

    public function reload()
    {
        /*
        * Se sacan los datos siempre del cache
        */
        $personas = Cache::get('listado_chicas');

        $url_base = 'https://webcams.cumlouder.com/joinmb/cumlouder/';
        $url_images = 'https://w0.imgcm.com/modelos/';

        foreach($personas as $persona)
        {
            $chicas[] = [
                'link'      => $url_base . $persona->wbmerPermalink .'/?nats=',
                'nombre'    => $persona->wbmerNick,
                'imagen'    => $url_images . $persona->wbmerThumb1,
            ];
        }

        return view('reload', ['chicas' => $chicas])->render();
    }
}
