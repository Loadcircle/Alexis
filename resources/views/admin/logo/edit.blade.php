@extends('layouts.app')

@section('content')
<style>
    #profile-img-tag{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 120px;
        margin-top: 10px;
        box-shadow: 0px 5px 20px;
        background: rgba(0, 0, 0, 0.5)
    }
</style>
    <div class="container">

        {!! Form::model($logo, ['route' => ['logos.update', $logo->id],'name' => 'contacto', 'method' => 'PUT', 'files' => true]) !!}

            @include('admin.logo.partials.form')

        {!! Form::close() !!}

    </div>
@endsection
