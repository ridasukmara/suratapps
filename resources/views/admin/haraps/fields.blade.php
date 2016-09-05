<!-- Nama Harap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_harap', 'Nama Harap:') !!}
    {!! Form::text('nama_harap', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.haraps.index') !!}" class="btn btn-default">Cancel</a>
</div>
