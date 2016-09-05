<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sifatsurat->id !!}</p>
</div>

<!-- Nama Sifatsurat Field -->
<div class="form-group">
    {!! Form::label('nama_sifatsurat', 'Nama Sifatsurat:') !!}
    <p>{!! $sifatsurat->nama_sifatsurat !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sifatsurat->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sifatsurat->updated_at !!}</p>
</div>

