<!-- Dari Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dari', 'Dari:') !!}
    {!! Form::text('dari', null, ['class' => 'form-control']) !!}
</div>

<!-- No Suratmasuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_suratmasuk', 'No Suratmasuk:') !!}    
    {!! Form::text('no_suratmasuk', null, ['class' => 'form-control']) !!}    
</div>

<!-- No Urut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_urut', 'No Urut:') !!}
    {!! Form::text('no_urut', null, ['class' => 'form-control']) !!}
</div>

<!-- Indeks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indeks', 'Indeks:') !!}
    {!! Form::text('indeks', null   , ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Suratmasuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_suratmasuk', 'Tanggal Suratmasuk:') !!}
    @if($suratmasuk)
    {!! Form::date('tanggal_suratmasuk', \Carbon\Carbon::parse($suratmasuk->tanggalsuratmasuk) , ['class' => 'form-control']) !!}
    @else
    {!! Form::date('tanggal_suratmasuk', \Carbon\Carbon::now() , ['class' => 'form-control']) !!}
    @endif
    <p style="font-size:10px; color:red">  * Bulan/Tanggal/Tahun</p>
</div>

<!-- Tanggal Diteruskan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_diteruskan', 'Tanggal Diteruskan:') !!}
    @if($suratmasuk)
    {!! Form::date('tanggal_diteruskan', \Carbon\Carbon::parse($suratmasuk->tanggalditeruskan), ['class' => 'form-control']) !!}
    @else
    {!! Form::date('tanggal_diteruskan', \Carbon\Carbon::now() , ['class' => 'form-control']) !!}
    @endif
    <p style="font-size:10px; color:red">  * Bulan/Tanggal/Tahun</p>
</div>

<!-- Perihal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perihal', 'Perihal:') !!}
    {!! Form::text('perihal', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Klasifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_klasifikasi', 'Klasifikasi Surat:') !!}
    {!! Form::select('id_klasifikasi', $arr_klasifikasi ,null, ['class' => 'form-control']) !!}
</div>


<!-- Id Klasifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_sifatsurat', 'Sifat Surat:') !!}
    {!! Form::select('id_sifatsurat', $arr_sifatsurat ,null, ['class' => 'form-control']) !!}
</div>

<!-- Isi Ringkas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('isi_ringkas', 'Isi Ringkas:') !!}
    {!! Form::textarea('isi_ringkas', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.suratmasuks.index') !!}" class="btn btn-default">Cancel</a>
</div>
