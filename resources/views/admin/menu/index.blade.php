@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="text-center">Configuracion Menus de navegación</h1>
        <hr>
        
        <div class="container">

                <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Section</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th colspan="3">Acci&oacute;n</th>                                    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menu as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td>{{ $m->section }}</td>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->position }}</td>
                                <td>{{ $m->status }}</td>
                                <td>
                                    <a href="{{ route('menus.edit', $m->id) }}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/pencil.svg')}}" alt="" srcset=""></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
</div>       

@endsection