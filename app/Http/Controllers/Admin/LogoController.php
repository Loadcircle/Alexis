<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LogoUpdateRequest;
use App\Logo;

class LogoController extends Controller
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
        //config
        $logo     = Logo::orderBy('id', 'ASC')->get();
        //config
        return view('admin.logo.index', compact('logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $logo = Logo::find($id);
        //dd($logo->file);
        return view('admin.logo.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogoUpdateRequest $request, $id)
    {
        $logo = Logo::find($id);
        //$this->authorize('pass', $logo);

        //image
        if($request->file('file')){ //esta condicion verifica en el formulario si se ha enviado un archivo

            Logo::disk('public')->delete($logo->file);

            $logo->delete();

            $path = Storage::disk('public')//almacenar en el disco public que busca en filesystems.php en config
                ->put('image', $request->file('file'));  //almacena en una carpeta llamada 'image' el archivo request
                //todo este codigo superior genero una ruta relativa
                $logo->fill(['file' => $path])->save();
                //con fill agregamos a la variable logo la ruta generada como 'file', asset convierte la ruta en una ruta completa
        }

        $logo->fill(['status' => $request->status])->save();

         return redirect()->route('logos.index')
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
        //
    }
}
