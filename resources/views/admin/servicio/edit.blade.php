@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::model($servicio, ['route' => ['servicios.update', $servicio->id],'name' => 'contacto', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

            @include('admin.servicio.partials.form')

        {!! Form::close() !!}

    </div>
@endsection
