@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::model($carousel, ['route' => ['sliders.update', $carousel->id],'name' => 'contacto', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

            @include('admin.slider.partials.form')

        {!! Form::close() !!}

    </div>
@endsection
