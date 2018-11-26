<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Slider;

class SliderController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); // esto pide que para entrar este autorizado, o sea logeado
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Slider::orderBy('id', 'ASC')->get();

        return view('admin.slider.index', compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Slider::pluck('position');

        $array=array();
        $i=1;
        foreach($count as $c){
            $array[$i]=$c;
            $i++;
        }

        return view('admin.slider.create', compact('array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderStoreRequest $request)
    {
        $carousel = Slider::create($request->all()); //esto retorna contenido masivo

        //image
        if($request->file('file')){ //esta condicion verifica en el formulario si se ha enviado un archivo

            $path = Storage::disk('public')//almacenar en el disco public que busca en filesystems.php en config
                ->put('image', $request->file('file'));  //almacena en una carpeta llamada 'image' el archivo request
                //todo este codigo superior genero una ruta relativa

                $carousel->fill($request->all())->save();

                $carousel->fill(['file' => $path])->save();
                //con fill agregamos a la variable carousel la ruta generada como 'file', asset convierte la ruta en una ruta completa

                return redirect()->route('sliders.index')
                    ->with('info', 'Carousel creado con éxito');
        }


        }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Slider::pluck('position');
        $carousel = Slider::find($id);

        $array=array();
        $i=1;
        foreach($count as $c){
            $array[$i]=$c;
            $i++;
        }

        return view('admin.slider.edit', compact('array', 'carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        $carousel = Slider::find($id);
        //$this->authorize('pass', $carousel);

        //image
        if($request->file('file')){ //esta condicion verifica en el formulario si se ha enviado un archivo

            Storage::disk('public')->delete($carousel->file);

            $path = Storage::disk('public')//almacenar en el disco public que busca en filesystems.php en config
                ->put('image', $request->file('file'));  //almacena en una carpeta llamada 'image' el archivo request
                //todo este codigo superior genero una ruta relativa
                $carousel->fill($request->all())->save();

                $carousel->fill(['file' => $path])->save();
                //con fill agregamos a la variable carousel la ruta generada como 'file', asset convierte la ruta en una ruta completa
        }else{
            $carousel->fill(['tittle' => $request->tittle, 'position' => $request->position, 'status' => $request->status])->save();
        }

         return redirect()->route('sliders.index')
         ->with('info', 'Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post = Post::find($id)->delete();  este codigo ejecuta directamente el delete
        $carousel = Slider::find($id);
        //print_r($carousel->file);
        //$this->authorize('pass', $carousel);

        Storage::disk('public')->delete($carousel->file);
        $carousel->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
