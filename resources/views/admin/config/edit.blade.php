@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::model($config, ['route' => ['configs.update', $config->id],'name' => 'contacto', 'method' => 'PUT']) !!}

            @include('admin.config.partials.form')

        {!! Form::close() !!}

    </div>
@endsection
