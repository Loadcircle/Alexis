<div class="form-group row">
    <div class="col-sm-4">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'readonly']) }}
    </div>
    <div class="col-sm-4">
        {{ Form::text('value', null, ['class' => 'form-control', 'id' => 'value']) }}
    </div>
    <div class="col-sm-4">
        {{ Form::select('status', array(
            'ACTIVE' => 'Active',
            'INACTIVE' => 'Inactive',
        ), null,['class' => 'form-control', 'id' => 'status']) }}
    </div>
</div>

<div class="form-group text-center">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
