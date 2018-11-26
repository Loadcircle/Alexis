<div class="form-group row">
    <div class="col-sm-4">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'readonly']) }}
    </div>
    <div class="col-sm-4">
        {{ Form::file('file', ['class' => 'form-control', 'id' => 'file']) }}        
        <img @if (isset($logo->file) && !empty($logo->file))src="{{ asset('').'/'.$logo->file}}"@else{ src="" }@endif id="profile-img-tag" width="200px" />          
    </div>
    <div class="col-sm-4">
        {{ Form::select('status', array(
            'ACTIVE' => 'Active',
            'INACTIVE' => 'Inactive',
        ), null,['class' => 'form-control', 'id' => 'status']) }}
    </div>
</div>


      
<script type="text/javascript">
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
</script>


<div class="form-group text-center">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
