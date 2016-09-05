<!-- Nama Sifatsurat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_sifatsurat', 'Nama Sifatsurat:') !!}
    {!! Form::text('nama_sifatsurat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.sifatsurats.index') !!}" class="btn btn-default">Cancel</a>
</div>
