@extends('layouts.admin')

@section('content')
    <div class="container">
       
        {!! Form::model($menu, ['route' => ['menus.update', $menu->id],'name' => 'contacto', 'method' => 'PUT']) !!}

            @include('admin.menu.partials.form')

        {!! Form::close() !!}
                
    </div>
@endsection
