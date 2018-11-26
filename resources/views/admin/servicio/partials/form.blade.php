<div class="form-group ">
    {!! Form::label('tipo_servicio_id', 'Tipo de Servicio') !!}
    {{ Form::select('tipo_servicio_id', $servicios, null,['class' => 'form-control', 'id' => 'tipo_servicio_id']) }}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            {!! Form::label('titulo', 'Titulo') !!}
            {{ Form::text('titulo', null, ['class' => 'form-control', 'id' => 'titulo']) }}
        </div>
        <div class="form-group ">
            {!! Form::label('subtitulo', 'Subtitulo') !!}
            {{ Form::text('subtitulo', null, ['class' => 'form-control', 'id' => 'subtitulo']) }}
        </div>
        <div class="form-group ">
            {!! Form::label('precio', 'Precio') !!}
            {{ Form::text('precio', null, ['class' => 'form-control', 'id' => 'precio']) }}
        </div>
        <div class="form-group ">
            {!! Form::label('contenido', 'Contenido') !!}
            {{ Form::textarea('contenido', null, ['class' => 'form-control', 'id' => 'contenido']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group ">
            {!! Form::label('slug', 'Url amigable') !!}
            {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
        </div>
        <div class="form-group">
            {!! Form::label('fecha_inicio', 'Fecha de inicio') !!}
            {{ Form::date('fecha_inicio', null, ['class' => 'form-control', 'id' => 'fecha_inicio']) }}
        </div>
        <div class="form-group">
            {!! Form::label('fecha_fin', 'Fecha de fin') !!}
            {{ Form::date('fecha_fin', null, ['class' => 'form-control', 'id' => 'fecha_fin']) }}
        </div>
        <div class="form-group ">
            {{ Form::file('file', ['class' => 'form-control', 'id' => 'file']) }}
        </div>
        <img class="img-fluid" @if (isset($servicio->file) && !empty($servicio->file))src="{{ asset('').'/'.$servicio->file}}"@else{ src="" }@endif id="profile-img-tag" width="100%" />
    </div>
</div>
<div class="form-group ">
    {!! Form::label('status', 'Estado') !!}
    {{ Form::select('status', array(
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
    ), null,['class' => 'form-control', 'id' => 'status']) }}
</div>
<div class="form-group ">
    {!! Form::label('condiciones', 'Condiciones y Servicios') !!}
    {{ Form::textarea('condiciones', null, ['class' => 'form-control', 'id' => 'condiciones']) }}
</div>
<div class="form-group text-center">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>

    <script src="{{asset('vendor/ckeditor5/ckeditor.js')}}"></script>

    <script type="text/javascript">
        //Script para convertir el texto de name a slug (url)
        document.addEventListener("DOMContentLoaded", function(e) {
            var name = document.getElementById('titulo'),
                slug = document.getElementById('slug');

            name.onkeyup = function() {
            slug.value = string_to_slug(name.value);
            }
        });
        function string_to_slug (str) {
                str = str.replace(/^\s+|\s+$/g, ''); // trim
                str = str.toLowerCase();
                // remove accents, swap ñ for n, etc
                var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                var to   = "aaaaeeeeiiiioooouuuunc------";
                for (var i=0, l=from.length ; i<l ; i++) {
                    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
                str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                    .replace(/\s+/g, '-') // collapse whitespace and replace by -
                    .replace(/-+/g, '-'); // collapse dashes

                return str;
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file").change(function(){
            readURL(this);
        });
        ClassicEditor
        .create( document.querySelector( '#content' ), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            }
        } )
    </script>

