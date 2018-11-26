@extends('layouts.admin')

@section('content')
    <div class="container">
       
        {!! Form::model($content, ['route' => ['contents.update', $content->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            @include('admin.content.partials.form')

        {!! Form::close() !!}
                
    </div>
@endsection
