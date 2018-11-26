@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1 class="text-center">Configuracion Principal</h1>
        <hr>

        <div class="container">

                <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th colspan="3">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($config as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->value }}</td>
                                <td>{{ $c->status }}</td>
                                <td>
                                    <a href="{{ route('configs.edit', $c->id) }}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/pencil.svg')}}" alt="" srcset=""></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
</div>

@endsection
