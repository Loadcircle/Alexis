@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="text-center">Contenido de la seccion {{$titulo_seccion}}</h1>
        <hr>
        <div class="container">            
        @if (empty($section_type))
        <h2 class="text-center">Selecciona el tipo de sección</h2>
        <div style="display: grid; grid-template-columns: auto auto auto; grid-gap: 20px 20px; align-items: center;">                
            @foreach ($section_types as $st)
            <div class="card" style="width: 100%; height: 100%">
                <img class="card-img-top" style="height: 200px" src="{{asset('admin').'/'.$st->file}}" alt="Card image cap">
                <div class="card-body text-center">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#confirmar{{$st->id}}" style="background: #212529; border: 0;">Seleccionar</a>
                </div>
            </div>

            <div class="modal fade" id="confirmar{{$st->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" style="margin-top: 15%">
                            <h1 class="text-center" style="color: white;">¿Desea confirmar esta sección?</h1>
                          <div class="modal-content" style="background: transparent; border: none;">                
                            {!! Form::open(['route'=>['contents.stype',$section_id, $st->id], 'method'=>'POST']) !!}
                                <button class="btn btn-sm btn-success my-3" style="width: 100%">
                                    Confirmar
                                </button>
                            {!! Form::close() !!}
                                <button class="btn btn-sm btn-secondary my-3" data-dismiss="modal">
                                    Cancelar
                                </button>
                          </div>
                        </div>
                  </div>

            @endforeach
        </div>
        @else
                <a class="float-right my-2" href="{{ route('contents.create',['id' => $section_id]) }}"><img width="20px" src="{{asset('admin/image/plus-black-symbol.svg')}}" alt=""></a>
                <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>File</th>
                                <th>Position</th>
                                <th>Section</th>
                                <th>Status</th>
                                <th colspan="3">Acci&oacute;n</th>                                    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td width="300px">{{ substr($c->content, 0, 100) }}...</td>
                                <td>
                                    @if (isset($c->file) && !empty($c->file))
                                    <img style="width: 110px" src="{{asset('').'/'.$c->file}}" alt="">                                    
                                    @endif
                                </td>
                                <td>{{ $c->position }}</td>
                                <td>{{ $c->section }}</td>
                                <td>{{ $c->status }}</td>
                                <td>
                                    <a href="{{ route('contents.edit',['section_id' =>$section_id, 'id' =>$c->id] ) }}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/pencil.svg')}}" alt="" srcset=""></a>
                                    <a href="#eliminar" data-toggle="modal" data-target=".bd-example-modal-sm{{$c->id}}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/waste-bin.svg')}}" alt="" srcset=""></a>                                 
                                    @if(!empty($c->file))                                       
                                    <a href="#show" data-toggle="modal" data-target=".bd-example-show-sm{{$c->id}}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/minus.svg')}}" alt="" srcset=""></a>                                 
                                    @endif
                                </td>
                            </tr>

                            <div style="margin-top: 10%" class="modal fade bd-example-show-sm{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <h1 class="text-center" style="color: white;">¿Desea eliminar la imagen del contenido?</h1>
                                      <div class="modal-content" style="background: transparent; border: none;">                
                                            <a href="{{ route('contents.show', $c->id) }}" class="btn btn-sm btn-danger" style="color: white;">
                                                Eliminar
                                            </a>
                                            <button class="btn btn-sm btn-primary my-3" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                      </div>
                                    </div>
                            </div>

                            <div style="margin-top: 10%" class="modal fade bd-example-modal-sm{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <h1 class="text-center" style="color: white;">¿Desea eliminar este registro?</h1>
                                  <div class="modal-content" style="background: transparent; border: none;">                
                                    {!! Form::open(['route'=>['contents.destroy', $c->id], 'method'=>'POST']) !!}
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
        
        @endif
        </div>
</div>       

@endsection