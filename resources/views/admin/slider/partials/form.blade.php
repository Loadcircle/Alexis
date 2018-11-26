<div class="row">
    <div class="col-md-6">

        <div class="form-group ">
            {{ Form::text('tittle', null, ['class' => 'form-control', 'id' => 'tittle']) }}  
        </div>

        <div class="form-group ">
            {{ Form::file('file', ['class' => 'form-control', 'id' => 'file']) }}               
        </div>   
        <div class="form-group ">             
            {!! Form::label('select', 'Position') !!}            
            {{ Form::select('position', $array, null,['class' => 'form-control', 'id' => 'position']) }}
        </div>   

        <div class="form-group ">             
            {!! Form::label('status', 'Select') !!}  
            {{ Form::select('status', array(
                'ACTIVE' => 'Active',
                'INACTIVE' => 'Inactive',
            ), null,['class' => 'form-control', 'id' => 'status']) }}
        </div>   
        
        <div class="form-group text-center">
            {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
        </div>
    </div> 
    <div class="col-md-6">
        <img class="img-fluid" @if (isset($carousel->file) && !empty($carousel->file))src="{{ asset('').'/'.$carousel->file}}"@else{ src="" }@endif id="profile-img-tag" width="100%" />                 
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
    
    