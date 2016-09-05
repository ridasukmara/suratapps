<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $klasifikasi->id !!}</p>
</div>

<!-- Kode Klasifikasi Field -->
<div class="form-group">
    {!! Form::label('kode_klasifikasi', 'Kode Klasifikasi:') !!}
    <p>{!! $klasifikasi->kode_klasifikasi !!}</p>
</div>

<!-- Nama Klasifikasi Field -->
<div class="form-group">
    {!! Form::label('nama_klasifikasi', 'Nama Klasifikasi:') !!}
    <p>{!! $klasifikasi->nama_klasifikasi !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $klasifikasi->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $klasifikasi->updated_at !!}</p>
</div>

