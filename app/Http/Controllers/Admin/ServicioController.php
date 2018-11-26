<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServicioStoreRequest;
use App\Http\Requests\ServicioUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Servicio;
use App\Tipo_servicio;

class ServicioController extends Controller
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
        //servicio
        $servicio     = Servicio::join('tipo_servicios', 'servicios.tipo_servicio_id', '=','tipo_servicios.id')
                                ->select('servicios.*', 'tipo_servicios.name as s_name', 'tipo_servicios.file as s_file')
                                ->where('servicios.status', 'ACTIVE')
                                ->orderBy('id', 'DESC')->get();
        //servicio

        return view('admin.servicio.index', compact('servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //servicio
        $servicios     = Tipo_servicio::pluck('name', 'id');
        //servicio

        return view('admin.servicio.create', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioStoreRequest $request)
    {
        $servicio = Servicio::create($request->all()); //esto retorna contenido masivo

        //image
        if($request->file('file')){ //esta condicion verifica en el formulario si se ha enviado un archivo

            $path = Storage::disk('public')//almacenar en el disco public que busca en filesystems.php en config
                ->put('image', $request->file('file'));  //almacena en una carpeta llamada 'image' el archivo request
                //todo este codigo superior genero una ruta relativa

                $servicio->fill($request->all())->save();

                $servicio->fill(['file' => $path])->save();
                //con fill agregamos a la variable content la ruta generada como 'file', asset convierte la ruta en una ruta completa


                return redirect()->route('servicios.index')
                    ->with('info', 'Contenido creado con éxito');
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
        $servicio = Servicio::find($id);
        $servicios = Tipo_servicio::pluck('name', 'id');
        return view('admin.servicio.edit', compact('servicio', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioUpdateRequest $request, $id)
    {
        $servicio = Servicio::find($id);
        //$this->authorize('pass', $carousel);

        //image
        if($request->file('file')){ //esta condicion verifica en el formulario si se ha enviado un archivo

            Storage::disk('public')->delete($servicio->file);

            $path = Storage::disk('public')//almacenar en el disco public que busca en filesystems.php en config
                ->put('image', $request->file('file'));  //almacena en una carpeta llamada 'image' el archivo request
                //todo este codigo superior genero una ruta relativa
                $servicio->fill($request->all())->save();

                $servicio->fill(['file' => $path])->save();
                //con fill agregamos a la variable carousel la ruta generada como 'file', asset convierte la ruta en una ruta completa
        }else{
            $servicio->fill(['titulo' => $request->titulo, 'subtitulo' => $request->subtitulo,'slug' => $request->slug, 'precio' => $request->precio, 'contenido' => $request->contenido, 'fecha_inicio' => $request->fecha_inicio, 'fecha_fin' => $request->fecha_fin, 'condiciones' => $request->condiciones, 'tipo_servicio_id' => $request->tipo_servicio_id, 'status' => $request->status])->save();
        }

         return redirect()->route('servicios.index')
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
        $servicio = Servicio::find($id);
        //print_r($carousel->file);
        //$this->authorize('pass', $carousel);

        Storage::disk('public')->delete($servicio->file);
        $servicio->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
