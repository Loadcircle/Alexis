@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::open(['route' => 'sliders.store', 'files' => true , 'enctype' => 'multipart/form-data']) !!}

            @include('admin.slider.partials.form')

        {!! Form::close() !!}

    </div>

@endsection
