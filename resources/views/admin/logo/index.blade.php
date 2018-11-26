@extends('layouts.app')

@section('content')
<style>
    .logos{
        width: 50px;
        background: rgba(0, 0, 0, .5);
    }
</style>
<div class="container-fluid">
    <h1 class="text-center">Configuracion Logos</h1>
        <hr>
        <div class="container">

                <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Status</th>
                                <th colspan="3">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logo as $l)
                            <tr>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->name }}</td>
                                <td><img class="logos" src="{{asset('').'/'.$l->file}}" alt=""></td>
                                <td>{{ $l->status }}</td>
                                <td>
                                    <a href="{{ route('logos.edit', $l->id) }}" class="btn btn-sm btn-default"><img width="25px" src="{{asset('admin/image/pencil.svg')}}" alt="" srcset=""></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
</div>

@endsection
