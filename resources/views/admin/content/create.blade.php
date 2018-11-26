@extends('layouts.admin')

@section('content')
    <div class="container">
       
        {!! Form::open(['route' => 'contents.store', 'files' => true , 'enctype' => 'multipart/form-data']) !!}

            @include('admin.content.partials.form')

        {!! Form::close() !!}
                
    </div>

@endsection
