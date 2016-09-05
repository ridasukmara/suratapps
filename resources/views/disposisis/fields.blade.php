<!-- Id Suratmasuk Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('id_suratmasuk', 'Id Suratmasuk:') !!}
    {!! Form::text('id_suratmasuk', null, ['class' => 'form-control', 'readonly'=>'true']) !!}
</div> -->



{!! Form::hidden('id_suratmasuk', $suratmasuk->id) !!}

@if( (auth()->guard('pegawais')->user()) && (auth()->guard('pegawais')->user()->hak_akses== "1") )

<!-- Catatan Pengolah Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan_pengolah', 'Catatan Pengolah:') !!}
    {!! Form::textarea('catatan_pengolah', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

@elseif((auth()->guard('pegawais')->user()) && (auth()->guard('pegawais')->user()->hak_akses== "2") )

<!-- Catatan Admintu Field -->`
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan_admintu', 'Catatan Admintu:') !!}
    {!! Form::textarea('catatan_admintu', null, ['class' => 'form-control', 'rows' => '5' ]) !!}
</div>
@elseif( (auth()->guard('pegawais')->user()) && (auth()->guard('pegawais')->user()->hak_akses== "3") )

<!-- Catatan Adminkepala Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan_adminkepala', 'Catatan Adminkepala:') !!}
    {!! Form::textarea('catatan_adminkepala', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Tanggal Verifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_verifikasi', 'Tanggal Verifikasi:') !!}
    {!! Form::date('tanggal_verifikasi', Carbon\Carbon::now(), ['class' => 'form-control']) !!}    
</div>

<!-- Id Harap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_harap', 'Harap:') !!}
    {!! Form::select('id_harap', $arr_harap , $disposisi->harap->id, ['class' => 'form-control']) !!}
</div>

<!-- Verifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('verifikasi', 'Verifikasi:') !!}
    {!! Form::checkbox('verifikasi', null , $disposisi->verifikasi,['class' => 'checkbox']) !!}
</div>

@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.suratmasuks.disposisi', [$suratmasuk->id, $disposisi->id]) !!}" class="btn btn-default">Cancel</a>
</div>
