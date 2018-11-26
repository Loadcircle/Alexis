@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1 class="text-center">Configuracion de las Secciones</h1>
        <hr>

        <div class="container">
                <a class="float-right my-2" href="{{ route('servicios.create') }}"><img width="20px" src="{{asset('admin/image/plus-black-symbol.svg')}}" alt=""></a>
                <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Titulo</th>
                                <th>Contenido</th>
                                <th>Image</th>
                                <th>Tipo de Servicio</th>
                                <th>Status</th>
                                <th colspan="3">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicio as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->titulo }}</td>
                                <td width="300px">{{ substr($s->contenido, 0, 100) }}...</td>
                                <td><img style="width: 110px" src="{{asset('').'/'.$s->file}}" alt=""></td>
                                <td>{{ $s->s_name }}</td>
                                <td>{{ $s->status }}</td>
                                <td>
                                    <a href="{{ route('servicios.edit', $s->id) }}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/pencil.svg')}}" alt="" srcset=""></a>
                                    <a href="#eliminar" data-toggle="modal" data-target=".bd-example-modal-sm{{$s->id}}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/waste-bin.svg')}}" alt="" srcset=""></a>
                                </td>
                            </tr>

                            <div style="margin-top: 10%" class="modal fade bd-example-modal-sm{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <h1 class="text-center" style="color: white;">¿Desea eliminar este registro?</h1>
                                  <div class="modal-content" style="background: transparent; border: none;">
                                    {!! Form::open(['route'=>['servicios.destroy', $s->id], 'method'=>'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                        <button class="btn btn-sm btn-primary my-3" data-dismiss="modal">
                                            Cancelar
                                        </button>
                                  </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
        </div>
</div>

@endsection
