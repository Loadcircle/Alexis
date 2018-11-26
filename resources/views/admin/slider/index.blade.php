@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1 class="text-center">Configuracion del Carousel principal</h1>
        <hr>

        <div class="container">
            <a class="float-right my-2" href="{{ route('sliders.create') }}"><img width="20px" src="{{asset('admin/image/plus-black-symbol.svg')}}" alt=""></a>
                <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>File</th>
                                <th>Tittle</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th colspan="3">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carousel as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td><img class="img-fluid" width="150px" src="{{asset('').'/'.$c->file}}" alt=""></td>
                                <td>{{ $c->tittle }}</td>
                                <td>{{ $c->position }}</td>
                                <td>{{ $c->status }}</td>
                                <td>
                                    <a href="{{ route('sliders.edit', $c->id) }}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/pencil.svg')}}" alt="" srcset=""></a>
                                    <a href="#eliminar" data-toggle="modal" data-target=".bd-example-modal-sm{{$c->id}}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/waste-bin.svg')}}" alt="" srcset=""></a>
                                </td>
                            </tr>
                            <div style="margin-top: 10%" class="modal fade bd-example-modal-sm{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <h1 class="text-center" style="color: white;">¿Desea eliminar este registro?</h1>
                                  <div class="modal-content" style="background: transparent; border: none;">
                                    {!! Form::open(['route'=>['sliders.destroy', $c->id], 'method'=>'DELETE']) !!}
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
