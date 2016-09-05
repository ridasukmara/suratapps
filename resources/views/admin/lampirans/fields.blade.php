<!-- Kode lampiran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lampiran', 'Kode lampiran:') !!}
    {!! Form::file('lampiran', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id_suratmasuk', $suratmasuk->id) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.suratmasuks.lampiran', ['id'=> $suratmasuk->id]) !!}" class="btn btn-default">Cancel</a>
</div>
