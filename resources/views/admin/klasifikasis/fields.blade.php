<!-- Kode Klasifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_klasifikasi', 'Kode Klasifikasi:') !!}
    {!! Form::text('kode_klasifikasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Klasifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_klasifikasi', 'Nama Klasifikasi:') !!}
    {!! Form::text('nama_klasifikasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.klasifikasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
