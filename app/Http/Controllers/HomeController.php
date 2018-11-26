<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use App\Info;
use App\Servicio;
use App\Logo;
use App\Slider;
use App\Tipo_servicio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //logos
        $logos      = Logo::get();
        if((isset($logos['0']) && $logos['0']->status == 'ACTIVE')){
            $logo1 = $logos['0']->file;
        }
        if((isset($logos['1']) && $logos['1']->status == 'ACTIVE')){
            $logo2 = $logos['1']->file;
        }
        if((isset($logos['2']) && $logos['2']->status == 'ACTIVE')){
            $favicon = $logos['2']->file;
        }
        //logos

        //info
        $info     = Config::get();
        if((isset($info['0']) && $info['0']->status == 'ACTIVE')){
            $titulo = $info['0']->value;
        }
        if((isset($info['1']) && $info['1']->status == 'ACTIVE')){
            $telefono = $info['1']->value;
        }
        if((isset($info['2']) && $info['2']->status == 'ACTIVE')){
            $facebook = $info['2']->value;
        }
        if((isset($info['3']) && $info['3']->status == 'ACTIVE')){
            $direccion = $info['3']->value;
        }
        if((isset($info['4']) && $info['4']->status == 'ACTIVE')){
            $description = $info['4']->value;
        }
        if((isset($info['5']) && $info['5']->status == 'ACTIVE')){
            $keywords = $info['5']->value;
        }
        if((isset($info['6']) && $info['6']->status == 'ACTIVE')){
            $author = $info['6']->value;
        }
        //info

        //carousel
        $carousel   =Slider::where('status', 'ACTIVE')
                    ->orderBy('position', 'ASC')->get();
        //carousel


        //Menu
        $servicio   =Servicio::join('tipo_servicios', 'servicios.tipo_servicio_id', '=','tipo_servicios.id')
                    ->select('servicios.*', 'tipo_servicios.name as s_name', 'tipo_servicios.file as s_file')
                    ->where('servicios.status', 'ACTIVE')
                    ->orderBy('id', 'DESC')->limit('4')->get();
        //Menu

        return view('welcome',
        compact('logo1', 'logo2', 'favicon',
                'titulo', 'telefono', 'facebook', 'direccion','description', 'keywords', 'author',
                'carousel',
                'servicio'));
    }

    public function servicio($slug){
        $servicio = Servicio::where('slug', $slug)->first();

        return view('servicio', compact('servicio'));
    }
}
