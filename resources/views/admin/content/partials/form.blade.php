<div class="row">
        <div class="col-md-6">
    
            <div class="form-group ">
                {{ Form::hidden('section_id', $section_id, ['class' => 'form-control', 'id' => 'section_id']) }}  
            </div>
            <div class="form-group ">
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}  
            </div>
            <div class="form-group ">
                {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) }}  
            </div>
            <div class="form-group ">
                {{ Form::file('file', ['class' => 'form-control', 'id' => 'file']) }}               
            </div>  
            <div class="form-group ">             
                {!! Form::label('select', 'Position') !!}            
                {{ Form::select('position',array(
                    '1' => '1',
                    '2' => '2',
                ), null,['class' => 'form-control', 'id' => 'position']) }}
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
            <img class="img-fluid" @if (isset($content->file) && !empty($content->file))src="{{ asset('').'/'.$content->file}}"@else{ src="" }@endif id="profile-img-tag" width="100%" />                 
        </div>   
</div>    
        
        <script src="{{asset('vendor/ckeditor5/ckeditor.js')}}"></script>

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
            ClassicEditor
            .create( document.querySelector( '#content' ), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                }
            } )
        </script>
        
        