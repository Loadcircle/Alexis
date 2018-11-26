@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::open(['route' => 'servicios.store', 'files' => true , 'enctype' => 'multipart/form-data']) !!}

            @include('admin.servicio.partials.form')

        {!! Form::close() !!}

    </div>

@endsection
