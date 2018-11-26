<div class="form-group row">
        <div class="col-sm-3">
            {!! Form::label('name', 'Name') !!}
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
        </div>
        <div class="col-sm-3">
            {!! Form::label('position', 'Position') !!}   
            {{ Form::select('position', $array, null,['class' => 'form-control', 'id' => 'position']) }}
        </div>
        <div class="col-sm-3">        
            {!! Form::label('section_id', 'Section') !!}        
            {{ Form::select('section_id', $section, null,['class' => 'form-control', 'id' => 'section_id']) }}
        </div>
        <div class="col-sm-3">
            {!! Form::label('status', 'Status') !!}   
            {{ Form::select('status', array(
                'ACTIVE' => 'Active',
                'INACTIVE' => 'Inactive',
            ), null,['class' => 'form-control', 'id' => 'status']) }}
        </div>
    </div>
    
    <div class="form-group text-center">
        {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
    </div>