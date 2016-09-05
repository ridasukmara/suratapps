<!-- Nama Pegawai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pegawai', 'Nama Pegawai:') !!}
    {!! Form::text('nama_pegawai', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Nip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nip', 'Nip:') !!}
    {!! Form::number('nip', null, ['class' => 'form-control']) !!}
</div>

<!-- Hak Akses Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hak_akses', 'Hak Akses:') !!}
    {!! Form::select('hak_akses', [1 => 'Staff', 2 => 'Admin TU', 3 => 'Admin Kepala'], null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto') !!}
</div>
<div class="clearfix"></div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.pegawais.index') !!}" class="btn btn-default">Cancel</a>
</div>
